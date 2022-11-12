@extends('layouts.app')
@section('content')
        <div class="text-center align-middle">
            <br><br><br>
            <a class="btn btn-primary">Current Bids: {{$total}}</a><br><br>
            <a class="btn btn-primary">Available Bids: {{$total2}}</a><br><br>
            <a class="btn btn-primary">Account Status: {{$seller->status}}</a>
        </div>
@endsection