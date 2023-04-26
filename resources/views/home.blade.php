@extends('layout')
@section('content')
    <div class="content">
        <form class="container" id="SubmitForm" method="POST" action="{{ route('edit') }}">
            @csrf {{ csrf_field() }}
            <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="logo">
            <h3>Your Information:</h3>
            @if (session()->has('success'))
                <div class="done">
                    {{ session()->get('success') }}
                </div>
            @endif
            <input type="text" placeholder="name" name="name" class="input" value="{{ $response['user']->name }}">
            <input type="text" placeholder="email" name="email" class="input" value="{{ $response['user']->email }}">
            <input type="password" placeholder="password" name="password"
                class="input @error('password') is-invalid @enderror" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="password" placeholder="renter-password" class="input  @error('password') is-invalid @enderror"
                name="password_confirmation" required>
            <input type="number" name="phone_number" placeholder="phone number: 71XXXXXX" class="input"
                value="{{ $response['user']->phone_number }}">
            <div action="/action_page.php" class="gender">
                <label for="department">Department:</label>
                <select name="department_id" id="department_id" class="dropdown">
                    @foreach ($response['department'] as $dep)
                        @if ($response['user']->department_id == $dep->id)
                            <option id="{{ $dep->id }}" value="{{ $dep->id }}" selected>{{ $dep->name }}
                            </option>
                        @else
                            <option id="{{ $dep->id }}" value="{{ $dep->id }}">{{ $dep->name }}</option>
                        @endif
                    @endforeach
                </select>
                <br><br>
            </div>
            <div action="/action_page.php" class="gender">
                <label for="genders">Gender:</label>
                <select name="gender" id="gender" class="dropdown">
                    @if ($response['user']->gender == 'male')
                        <option id="1" value="male" selected>Male</option>
                        <option id="2" value="female">Female</option>
                    @elseif($response['user']->gender == 'female')
                        <option id="1" value="male">Male</option>
                        <option id="2" value="female" selected>Female</option>
                    @endif
                </select>
                <br><br>
            </div>
            <input type="submit" value="Edit" class="button">
        </form>
        <div class="delete">
            <a href="{{ route('del') }}"><button type="submit" value="delete" class="button">Delete Account</button></a>
        </div>

    </div>
@endsection
