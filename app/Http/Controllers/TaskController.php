<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class TaskController extends Controller
{
    public function index() {

        $user = Auth::user();
        $userId = Auth::id();

        if($user->role !== 'student') {

             $projects = Project::orderByRaw("FIELD(status, 'delayed', 'in_progress', 'completed')")
                                ->orderBy('deadline', 'asc')->get();
        } else {
            
            $projects = Project::forUser($userId)->orderBy('deadline', 'asc')->get();
        }

        return view('tasks.index', ['projects' => $projects]);
    }
}
