@extends('layouts.default')
@section('title', 'signup')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/log_sign.css') }}">
    </head>

    <body>
        <div id="form" class="wrapper">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <h2 id="heading">SignUp Form</h2><br>
            <form name="form" action="{{ route('signup.post') }}" method="POST">
                @csrf
                <div class="input-field">
                    <label for="first" class="form-label">Enter Firstname:</label>
                    <input type="text" id="first" name="first" class="form-control" required>
                </div>
                <div class="input-field">
                    <label for="last" class="form-label">Enter Lastname:</label>
                    <input type="text" id="last" name="last" class="form-control" required>
                </div>
                <div class="input-field">
                    <label for="email" class="form-label">Enter Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="input-field">
                    <label for="pass" class="form-label">Create Password:</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>
                <button type="submit" id="btn" ">SignUp</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>

        {{--  <form name="form" action="{{ route('login.post') }}" method="POST" onsubmit="return isValid();">
                @csrf
                <div class="input-field">
                    <input type="text" id="user" name="user" required>
                    <label for="user" >Enter your email</label>
                </div>
                <div class="input-field">
                    <input type="password" id="pass" name="pass"  required>
                    <label for="pass">Enter your password</label>
                </div>
                <div class="forget">
                    <label for="remember">
                      <input type="checkbox" id="remember">
                      <p>Remember me</p>
                    </label>
                </div>
                <button type="submit" id="btn">Login</button>
            </form> --}}
    </body>

    </html>
@endsection
