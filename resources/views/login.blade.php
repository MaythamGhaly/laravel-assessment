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
            <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="password" placeholder="password" class="input @error('password') is-invalid @enderror"
                id="password" name="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit" class="button">Login</button>
            <a href="{{ route('register') }}" class="button">Register</a>
        </form>
    </div>
@endsection

@push('dashboard-scripts')
    <script>
        $('#SubmitForm').on('submit', function(e) {

            let email = $('#email').val();
            let pass = $('#password').val();
            console.log('submit')

            $.ajax({
                url: "/login",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",

                    email: email,
                    mobile: mobile,
                    message: message,
                },
                success: function(response) {
                    $('#successMsg').show();
                    console.log(response);
                },
                error: function(response) {
                    $('#nameErrorMsg').text(response.responseJSON.errors.name);
                    $('#emailErrorMsg').text(response.responseJSON.errors.email);
                    $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
                    $('#messageErrorMsg').text(response.responseJSON.errors.message);
                },
            });
        });
    </script>
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
