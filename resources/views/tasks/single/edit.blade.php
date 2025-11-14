<x-layout title="Edit Task">
    <h1>Edit Task</h1>

    <a href="{{ route('tasks.show', $task) }}">Task</a>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @method("PUT")

        <x-forms.task :task="$task"/>
    </form>
</x-layout>