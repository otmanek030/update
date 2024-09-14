@extends("layouts.default")

@section("title", "Login")

@section("content")
   <div class="wrapper">
        <div id="form">
            @if(session()->has("success"))
                <div class="alert alert-success">
                    {{ session()->get("success") }}
                </div>
            @endif
            @if(session()->has("error"))
                <div class="alert alert-danger">
                    {{ session()->get("error") }}
                </div>
            @endif
            <h id="heading">Login Form</h>
            <form name="form" action="{{ route('login.post') }}" method="POST" onsubmit="return isValid();">
                @csrf
                <div class="input-field">
                    <input type="text" id="user" name="email" required>
                    <label for="user">Enter your email</label>
                </div>
                <div class="input-field">
                    <input type="password" id="pass" name="password" required>
                    <label for="pass">Enter your password</label>
                </div>
                <div class="forget">
                    <label for="remember">
                        <input type="checkbox" id="remember">
                        <p>Remember me</p>
                    </label>
                </div>
                <button type="submit" id="btn">Login</button>
            </form>

        </div>
    </div>



@endsection
