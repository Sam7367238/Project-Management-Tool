<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Auth::user() -> projects() -> orderBy("created_at", "desc") -> paginate(10);

        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request -> validate([
            "name" => ["required", "max:150"]
        ]);

        $project = Auth::user() -> projects() -> create($attributes);

        return redirect() -> route("products.show", $project) -> with("status", "Project Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        Gate::authorize("owner", $project);

        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        Gate::authorize("owner", $project);

        return view("projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        Gate::authorize("owner", $project);

        $attributes = $request -> validate([
            "name" => ["required", "max:150"]
        ]);

        $project -> update($attributes);

        return redirect() -> route("projects.show", $project) -> with("status", "Project Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Gate::authorize("owner", $project);

        $project -> delete();

        return redirect() -> route("projects.index") -> with("status", "Project Deleted Successfully");
    }
}
