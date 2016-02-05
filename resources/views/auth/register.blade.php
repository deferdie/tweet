@extends('master-front')

<form method="POST" action="/auth/register" class="memberBookForm">
{!! csrf_field() !!}
    <div>
        Name
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <input type="submit" value="REGISTER" />
    </div>
</form>
