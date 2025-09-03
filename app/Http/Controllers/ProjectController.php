<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $userId = Auth::id();
        $user = Auth::user();

        if($user->role !== 'student') {

            $projects = Project::orderByRaw("FIELD(status, 'delayed', 'in_progress', 'completed')")->paginate(6);
        }else {

            $projects = Project::forUser($userId)->orderByRaw("FIELD(status, 'delayed', 'in_progress', 'completed')")->paginate(6);
        }


        return view('projects.index', ['projects' => $projects]);
    }

    public function show(Project $project) {
        
        $assignedUsers = $project->users;

        return view('projects.show', ['project' => $project, 'assignedUsers' => $assignedUsers]);
    }

    public function create() {
        
        return view('projects.create');
    }

    public function edit(Project $project) {

        return view('projects.edit', ['project' => $project]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'title' => 'required|string|max:255|min:10',
            'description' => 'nullable|string|max:1000',
            'deadline' => 'required|date|after_or_equal:today',
            'status' => 'in_progress',
        ]);

        $validated['user_id'] = Auth::id();

        $project = Project::create($validated);

        $project->users()->attach(Auth::id(), [
            'role_in_project' => 'Owner'
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created');
    }

    public function update(Request $request, Project $project) {

        $rules = [
            'title' => 'required|string|max:255|min:10',
            'description' => 'nullable|string|max:1000',
            'deadline' => 'required|date'
        ];

        if ($request->deadline !== $project->deadline?->format('Y-m-d')) {
            $rules['deadline'] = 'required|date|after_or_equal:today';
        }

        $validatedData = $request->validate($rules);

        $project->update($validatedData);

        return redirect()->route('projects.show', $project)->with('success', 'Project updated');
    }

    public function updateStatus(Request $request, Project $project) {
        
        $project->status = 'completed';
        $project->save();

        return back()->with('success', 'Project marked as completed');
    }

    public function destroy(Project $project) {
        
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted');
    }
}
