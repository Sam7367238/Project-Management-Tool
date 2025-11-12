<x-layout title="Create Project">
    <h1>Create Project</h1>

    <a href="{{ route('projects.index') }}">Projects</a>

    <x-forms.errors/>

    <form action="{{ route('projects.store') }}" method="POST">
        @method("POST")

        <x-forms.project/>
    </form>
</x-layout>