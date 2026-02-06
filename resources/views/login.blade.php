@extends('layouts.app')

@section('title', 'Welcome to login')
@section('style')
<style>

body {
    background-color: black;
    color: white;
}
input {
    border-radius: 4px;
    padding: 5px;
    outline: none;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;)
    justify-content: center;
    padding-top: 200px;
}
.loginForm {
    display: flex;
    flex-direction: column;
    width: 80%;
    gap: 20px 0;
    max-width: 600px;
}

.loginForm > * {
    display: flex;
    flex-direction: column;
    flex: 1;)
}
.login-button {
    background: rgba(255, 166, 0, 0.862);
    padding: 10px;
    border-radius: 5px;
}
</style>

@endsection
@section('content')
<div class='container'>
        <h1>Welcome back!</h1>
        <form method="POST" action="/login" id='login-form' class='loginForm'>
            @error('email')

            <div style='color:red; text-align:center'>{{$message}}</div>
            @enderror
            @csrf
            <div>
                <label for="">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name='password' id='password'>
            </div>
            <button type='submit' id='loginn button' class='login-button'>Login</button>
        </form>
    </div>
@endsection
