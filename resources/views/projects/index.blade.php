<x-layout title="Tasks">
    <h1>Projects</h1>

    <a href="{{ route('projects.create') }}">Create Project</a>

    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project) }}">{{ Str::limit($project -> name, 20) }}</a>
            </li>
        @endforeach
    </ul>

    {{ $projects -> links() }}
</x-layout>