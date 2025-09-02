<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderByRaw("FIELD(status, 'delayed', 'in_progress', 'pending', 'completed')")->paginate(6);

        return view('projects.index', ['projects' => $projects]);
    }

    public function show(Project $project) {
        
        return view('projects.show', ['project' => $project]);
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

        Project::create($validated);

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
