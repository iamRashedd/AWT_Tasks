@extends('layouts.app')
@section('content')
    <div>
        <h1 align="center">Contact Us</h1>
    </div>
    <form action="{{route('contact')}}" method="post">
    {{csrf_field()}}
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Your Name:</label>
        <div class="col-md-3">
            <input type="text" name="name" class="form-control" value="{{old('name')}}">

            @error('name')
                <span class="text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
    </div>
    <br>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">Your Email:</label>
        <div class="col-md-3">
            <input type="text" name="email" class="form-control" value="{{old('email')}}">

            @error('email')
                <span class="text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
    </div>
    <br>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">Your Message:</label>
        <div class="col-md-3">
            <textarea name="message" class="form-control height-50" value="{{old('message')}}"></textarea>

            @error('message')
                <span class="text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
    </div>

    <input type="submit" class="btn btn-success align-right" value="Submit">
    </form>
@endsection
