<x-layout title="Edit Project">
    <h1>Edit Project</h1>

    <a href="{{ route('projects.index') }}">Projects</a>

    <x-forms.errors/>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @method("PUT")

        <x-forms.project :project="$project"/>
    </form>
</x-layout>