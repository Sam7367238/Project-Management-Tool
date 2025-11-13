<?php

namespace App\Http\Controllers;

use App\Models\ProjectTask;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        Gate::authorize("owner", $project);

        $projectTasks = Auth::user() -> projectTasks() -> orderBy("created_at", "desc") -> paginate(10);

        return view("tasks.project.index", compact("projectTasks", "project"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        Gate::authorize("owner", $project);

        return view("tasks.project.create", compact("project"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        Gate::authorize("owner", $project);

        $task = $project -> tasks() -> create([
            "task" => $request -> task, 
            "completed" => $request -> boolean("completed")
        ]);

        return redirect() -> route("projects.projectTasks.show", [$project, $task]) -> with("status", "Task Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, ProjectTask $projectTask)
    {
        Gate::authorize("owner", $project);

        return view("tasks.project.show", compact("project", "projectTask"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, ProjectTask $projectTask)
    {
        Gate::authorize("owner", $project);

        return view("tasks.project.edit", compact("project", "projectTask"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project, ProjectTask $projectTask)
    {
        Gate::authorize("owner", $project);

        $attributes = $request -> validate([
            "task" => ["required", "max:255"],
            "completed" => $request -> boolean("completed")
        ]);

        $projectTask -> update($attributes);

        return redirect() -> route("projects.projectTasks.show", [$project, $projectTask]) -> with("status", "Task Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, ProjectTask $projectTask)
    {
        Gate::authorize("owner", $project);

        $projectTask -> delete();

        return redirect() -> route("projects.projectTasks.index", $project) -> with("status", "Task Deleted Successfully");
    }
}
