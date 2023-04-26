@extends('layout')
@section('content')
    <div class="content">
        <form class="container" id="SubmitForm" method="POST" action="{{ route('auth') }}">
            @csrf {{ csrf_field() }}
            <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="logo">
            @if (session()->has('error'))
                <div class="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            <input type="text" placeholder="email" class="input @error('email') is-invalid @enderror" id="email"
                name="email">
            <input type="password" placeholder="password" class="input @error('password') is-invalid @enderror"
                id="password" name="password">
            <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
            <button type="submit" class="button">Login</button>
            <a href="{{ route('registerPage') }}" class="button">Register</a>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITEKEY') }}"></script>

    <script>
        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye-slash");
            var input = $("#password");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });

        $(document).on('click', '.toggle-confirmation-password', function() {
            $(this).toggleClass("fa-eye-slash");
            var input = $("#password-confirm");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endpush
