@extends('layout')
@section('content')

<div class="content">
    <form class="container">
        <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="logo">
        <input type="text" placeholder="email" class="input">
        <input type="password" placeholder="password" class="input">
        <input type="submit" value="Login" class="button">
        <a href="{{ route('register') }}" class="button">Register</a>
    </form>
</div>

@endsection