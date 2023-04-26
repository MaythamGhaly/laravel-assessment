@extends('layout')
@section('content')
    <div class="content">
        <form class="container">
            <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="logo">
            <h3>Your Information:</h3>
            <input type="text" placeholder="name" class="input" value="{{ $response['user']->name }}">
            <input type="text" placeholder="email" class="input" value="{{ $response['user']->email }}">
            <input type="password" placeholder="password" class="input">
            <input type="password" placeholder="renter-password" class="input">
            <input type="number" placeholder="phone number: 71XXXXXX" class="input"
                value="{{ $response['user']->phone_number }}">
            <input type="text" placeholder="department" class="input" value="{{ $response['user']->department_id }}">
            <div action="/action_page.php" class="gender">
                <label for="department">Department:</label>
                <select name="department" id="department" class="dropdown">
                    @foreach ($response['department'] as $dep)
                        @if ($response['user']->department_id == $dep->id)
                            <option value="volvo" selected>{{ $dep->name }}</option>
                        @else
                            <option value="volvo">{{ $dep->name }}</option>
                        @endif
                    @endforeach
                </select>
                <br><br>
            </div>
            <div action="/action_page.php" class="gender">
                <label for="genders">Gender:</label>
                <select name="genders" id="gender" class="dropdown">
                    @if ($response['user']->gender == 'male')
                        <option value="volvo" selected>Male</option>
                        <option value="saab">Female</option>
                    @elseif($response['user']->gender == 'female')
                        <option value="volvo">Male</option>
                        <option value="saab" selected>Female</option>
                    @endif
                </select>
                <br><br>
            </div>
            <input type="submit" value="Register" class="button">
        </form>
    </div>
@endsection
