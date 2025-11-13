<x-layout title="Tasks">
    <h1>Tasks For Project <a href="{{ route('projects.show', $project) }}">{{ $project -> name }}</a></h1>

    <a href="{{ route('projects.projectTasks.create', $project) }}">Create Task</a>

    <ul>
        @foreach ($projectTasks as $task)
            <li>
                <a href="{{ route('projects.projectTasks.show', [$project, $task]) }}">{{ Str::limit($task -> task, 20) }}</a>
                <p>Completed: {{ $task -> completed ? "True" : "False" }}</p>
            </li>

        @endforeach
    </ul>

    {{ $projectTasks -> links() }}
</x-layout>