<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectUserController extends Controller
{
    public function index(Project $project) {
        
        $assignedUsers = $project->users;

        return view('project-users.index', ['project' => $project, 'users' => User::all(), 'assignedUsers' => $assignedUsers]);
    }
}
