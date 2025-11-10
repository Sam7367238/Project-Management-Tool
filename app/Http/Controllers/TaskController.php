<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user() -> tasks() -> orderBy("created_at", "desc") -> paginate(10);

        return view("tasks.single.index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tasks.single.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            "task" => ["required", "max:255"]
        ]);

        $task = Auth::user() -> tasks() -> create([
            "task" => $request -> task, 
            "completed" => $request -> boolean("completed")
        ]);

        return redirect() -> route("tasks.show", $task) -> with("status", "Task Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        Gate::authorize("owner", $task);

        return view("tasks.single.show", compact("task"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        Gate::authorize("owner", $task);

        return view("tasks.single.edit", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // Don't use form request classes, I tried to validate an empty checkbox but it doesn't get passed in.

        Gate::authorize("owner", $task);

        $request -> validate([
            "task" => ["required", "max:255"]
        ]);

        $task -> update([
            "task" => $request -> task,
            "completed" => $request -> boolean("completed")
        ]);

        return redirect() -> route("tasks.show", $task) -> with("status", "Task Updated Successfully");
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize("owner", $task);

        $task -> delete();

        return redirect() -> route("tasks.index") -> with("status", "Task Deleted Successfully");
    }
}
