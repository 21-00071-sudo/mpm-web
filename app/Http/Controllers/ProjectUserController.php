<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;

class ProjectUserController extends Controller
{
    public function index(Project $project) {
        
        $assignedUsers = $project->users;

        $availableUsers = User::whereNotIn('id', $assignedUsers->pluck('id'))->get();

        return view('project-users.index', ['project' => $project, 'assignedUsers' => $assignedUsers, 'availableUsers' => $availableUsers]);
    }

    public function store(Request $request) {
        
        $validated = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'user_id' => 'required|integer|exists:users,id',
            'role_in_project' => 'nullable',
        ]);

        $existingAssignment = ProjectUser::where('project_id', $validated['project_id'])->where('user_id', $validated['user_id'])->first();

        if($existingAssignment) {
            return back()->withErrors(['duplicate' => 'User is already assigned to this project.']);
        }

        $projectUser = ProjectUser::create($validated);

        $project = Project::findOrFail($validated['project_id']);

        return redirect()->route('project-users.index', $project)->with('success', 'User added to the Project');
    }

    public function destroy(Request $request, $project_id, $user_id) {
        /*  $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:user,id',
        ]);

        $projectUser = ProjectUser::where('project_id', $validated['project_id'])->where('user_id', $validated['user_id'])->first(); */
        $user = User::findOrFail($user_id);
        $project = Project::findOrFail($project_id);
        
        $projectUser = ProjectUser::where('project_id', $project_id)->where('user_id', $user_id)->firstOrFail();

        $projectUser->delete();

        return redirect()->route('project-users.index', $project)->with('success', 'User remove to the Project');
    }
}
