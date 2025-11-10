<x-layout title="Tasks">
    <h1>Tasks</h1>

    <a href="{{ route('tasks.create') }}">Create Task</a>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task) }}">{{ Str::limit($task -> task, 20) }}</a>
                <p>Completed: {{ $task -> completed ? "True" : "False" }}</p>
            </li>

        @endforeach
    </ul>

    {{ $tasks -> links() }}
</x-layout>