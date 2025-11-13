<x-layout title="Project">
    <h1>Project</h1>

    <a href="{{ route('projects.index') }}">Projects</a>

    <div>
        <p>{{ $project -> name }}</p>
        <a href="{{ route('projects.projectTasks.index', $project) }}">Tasks</a>
        <hr>
        <p>Created At: {{ $project -> created_at -> diffForHumans() }}</p>
        <a href="{{ route('projects.edit', $project) }}">Edit</a>

        <form method="POST" action="{{ route('projects.destroy', $project) }}">
            @method("DELETE")
            @csrf

            <input type="submit" value="Delete">
        </form>
    </div>
</x-layout>