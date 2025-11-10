<x-layout title="Create Task">
    <h1>Create Task</h1>

    <a href="{{ route('tasks.index') }}">Tasks</a>

    <x-forms.errors/>

    <form action="{{ route('tasks.store') }}" method="POST">
        @method("POST")

        <x-forms.task-single/>
    </form>
</x-layout>