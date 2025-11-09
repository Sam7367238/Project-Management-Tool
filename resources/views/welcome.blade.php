<x-layout title="Home">
    <h1>Project Management Application</h1>
    <p>Your new project management solution.</p>
    <p>Simple and <b>flexible</b></p>

    @guest
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('login') }}">Login</a>
    @endguest

    @auth
        <a href="{{ route('dashboard') }}">Dashboard</a>
    @endauth
</x-layout>