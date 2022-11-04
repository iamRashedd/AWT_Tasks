@extends('layouts.app')
@section('content')
    <h1 align="center">
        Login Page
    </h1>
    <form action="{{route('login')}}" method="post">
        {{csrf_field()}}

        <div class="form-group row">
            <label class="col-md-2 col-form-label">Email:</label>
            <div class="col-md-3">
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label class="col-md-2 col-form-label">Password:</label>
            <div class="col-md-3">
                <input type="password" name="password" class="form-control" value="">
            </div>
        </div>
        <br>
        <div class="col-md-4 col-form-label">
            @if ($errors->any())
                <span class="text-danger">
                {{$errors->first()}}
                </span>
            @endif
        </div>
        
        <br>
        <input class="btn btn-success align-center" type="submit" name="submit" value="Login">
    </form>

@endsection