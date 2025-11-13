<x-layout title="Create Task">
    <h1>Create Task</h1>

    <a href="{{ route('projects.projectTasks.index', $project) }}">Tasks</a>

    <x-forms.errors/>

    <form action="{{ route('projects.projectTasks.store', $project) }}" method="POST">
        @method("POST")

        <x-forms.task-project/>
    </form>
</x-layout>