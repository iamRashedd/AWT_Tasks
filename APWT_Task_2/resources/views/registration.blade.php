@extends('layouts.app')
@section('content')
    <div>
        <h1 align="center">Registration</h1>
    </div>
    <form action="{{route('registration')}}"  method="post">
        {{csrf_field()}}
<!--
        <div calss="form-group row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
-->        
            
        <div class="form-group row">
            <label class="col-sm-2 col-form-label text-right"> Name: </label>
            <div class="col-sm-3">
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            @error('name')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
            <br>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Email: </label>
            <div class="col-sm-3">
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
                <br>
            </div>
        </div>

        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Date of Birth: </label> 
            <div class="col-sm-3">
                <input type="date" name="dob" class="form-control" value="{{old('dob')}}">

                @error('dob')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <br>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Account Type: </label> 
            <div class="col-sm-3">
                
                <select name="type" class="form-control" value="{{old('type')}}">
                    <option value="none">None</option>
                    <option value="buyer">Buyer</option>
                    <option value="seller">Seller</option>
                </select>

                @error('type')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Address: </label>
            <div class="col-sm-3">
                <input type="text" name="address" class="form-control" value="{{old('address')}}">
                @error('address')
                <span class="text-danger">
                    {{ $errors->first('address') }}
                </span>
                @enderror
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> New Password: </label>
            <div class="col-sm-3">
                <input type="password" name="password" class="form-control" value="">
                @error('password')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Confirm Password: </label>
            <div class="col-sm-3">
                <input type="password" name="confirmPassword" class="form-control" value="">
            </div>
        </div>
        <br>
        <div class="col-auto">
        <input type="submit" name="submit" class="btn btn-success" value="Submit">
        </div>
    </form>
@endsection
