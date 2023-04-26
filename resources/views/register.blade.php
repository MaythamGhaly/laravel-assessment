@extends('layout')

<div class="content">
    <form class="container" id="SubmitForm" method="POST" action="{{ route('register') }}">
        @csrf {{ csrf_field() }}
        <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="logo">
        <input type="text" placeholder="name" name="name" class="input" required>
        <input type="text" placeholder="email" name="email" class="input" required>
        <input type="password" placeholder="password" name="password" class="input @error('password') is-invalid @enderror" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="password" placeholder="renter-password" class="input  @error('password') is-invalid @enderror" name="password_confirmation" required>
        <input type="number" name="phone_number" placeholder="phone number: 71XXXXXX" class="input" required>
        <div action="/action_page.php" class="gender">
            <label for="department">Department:</label>
            <select name="department_id" id="department_id" class="dropdown">
                @foreach ($response['department'] as $dep)
                    <option id="{{$dep->id}}" value="{{$dep->id}}">{{ $dep->name }}</option>
                @endforeach
            </select>
            <br><br>
        </div>
        <div action="/action_page.php" class="gender">
            <label for="genders">Gender:</label>
            <select name="gender" id="gender" class="dropdown">
                <option id="1" value="male">Male</option>
                <option id="2" value="female">Female</option>
            </select>
            <br><br>
        </div>
        <input type="submit" value="Register" class="button">
    </form>
</div>
