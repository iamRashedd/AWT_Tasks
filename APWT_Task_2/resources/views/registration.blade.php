@extends('layouts.app')
@section('content')
    <div>
        <h1>Registration</h1>
    </div>
    <form action="/registered" method="post">
        {{csrf_field()}}

        Name: <input type="text name="name" value="{{old('name')}}">
        @if ($errors->has('name'))
        <span class="">
            <strong>
                {{ $errors->first('name')}}
            </strong>
        </span>

        Email: <input type="text" name="email" value="{{old('email')}}">
        @if  ($errors->has('email'))
        <span class="">
            <strong>{{ $errors->first('email') }}</strong>
        </span>

        Age: <input type="number" name="age" value="{{old('age')}}">
        @if  ($errors->has('age'))
        <span class="">
            <strong>{{ $errors->first('age') }}</strong>
        </span>

        Address: <input type="text" name="address" value="{{old('address')}}">
        @if  ($errors->has('address'))
        <span class="">
            <strong>{{ $errors->first('address') }}</strong>
        </span>
        
        New Password: <input type="password" name="password" value="">
        Confirm Password: <input type="password" name="confirmPassword" value="">
        @if  ($errors->has('password'))
        <span class="">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        
    </form>
@endsection
