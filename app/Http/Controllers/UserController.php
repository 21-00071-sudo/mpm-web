<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        
        $users = User::orderBy('created_at', 'desc')->paginate(7);

        return view('users.index', ['users' => $users]);
    }

    public function create() {

        return view('users.create');
    }

    public function generateCredentials(string $role) {

        $username = Str::slug($role) . '-' . rand(1000, 9999);
        $password = Str::random(8);

        return [
            'username' => $username,
            'password' => $password,
        ];
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'role' => ['required', 'string', Rule::in(['admin', 'staff', 'student'])],
        ]);

        $credentials = UserController::generateCredentials($request->input('role'));

        $user = User::create([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'username' => $credentials['username'],
            'password' => Hash::make($credentials['password']),
        ]);

        $user->plain_password = $credentials['password'];

        return redirect()->route('users.create')->with('user', $user);
    }

    public function destroy(User $user) {

        $user->delete();

        return redirect()->route('users.index');
    }
}
