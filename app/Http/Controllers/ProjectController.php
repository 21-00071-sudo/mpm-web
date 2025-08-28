<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderByRaw("FIELD(status, 'delayed', 'in_progress', 'pending', 'completed')")->paginate(6);

        return view('projects.index', ['projects' => $projects]);
    }
}
