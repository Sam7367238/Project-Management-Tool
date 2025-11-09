<x-layout title="Login">
    <h1>Login</h1>

    @if ($errors -> any())
        <ul>
            @foreach ($errors -> all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @method("POST")
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}">

        <label for="password">Password</label>
        <input type="password" name="password">

        <input type="submit" value="Sign Up">
    </form>
</x-layout>