<x-layout title="Edit Task">
    <h1>Edit Task</h1>

    <a href="{{ route('tasks.index') }}">Tasks</a>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @method("PUT")

        <x-forms.task-single :task="$task"/>
    </form>
</x-layout>