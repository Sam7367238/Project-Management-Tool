<x-layout title="Task">
    <h1>Task</h1>

    <a href="{{ route('projects.projectTasks.index', $project) }}">Tasks</a>

    <div>
        <p>{{ $projectTask -> task }}</p>
        <hr>
        <p>Completed: {{ $projectTask -> completed ? "True" : "False" }}</p>
        <p>Created At: {{ $projectTask -> created_at -> diffForHumans() }}</p>
        <a href="{{ route('projects.projectTasks.edit', [$project, $projectTask]) }}">Edit</a>

        <form method="POST" action="{{ route('projects.projectTasks.destroy', [$project, $projectTask]) }}">
            @method("DELETE")
            @csrf

            <input type="submit" value="Delete">
        </form>
    </div>
</x-layout>