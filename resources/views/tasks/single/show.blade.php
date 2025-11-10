<x-layout title="Task">
    <h1>Task</h1>

    <a href="{{ route('tasks.index') }}">Tasks</a>

    <div>
        <p>{{ $task -> task }}</p>
        <hr>
        <p>Completed: {{ $task -> completed ? "True" : "False" }}</p>
        <p>Created At: {{ $task -> created_at -> diffForHumans() }}</p>
        <a href="{{ route('tasks.edit', $task) }}">Edit</a>

        <form method="POST" action="{{ route('tasks.destroy', $task) }}">
            @method("DELETE")
            @csrf

            <input type="submit" value="Delete">
        </form>
    </div>
</x-layout>