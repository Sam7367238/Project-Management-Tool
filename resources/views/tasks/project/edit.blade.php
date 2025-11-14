<x-layout title="Create Task">
    <h1>Create Task</h1>

    <a href="{{ route('projects.projectTasks.index', [$project, $projectTask]) }}">Task</a>

    <x-forms.errors/>

    <form action="{{ route('projects.projectTasks.store', $project) }}" method="POST">
        @method("PUT")

        <x-forms.task :task="$projectTask"/>
    </form>
</x-layout>