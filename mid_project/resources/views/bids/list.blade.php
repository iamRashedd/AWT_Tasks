@extends('layouts.app')
@section('content')
<div class="col-md-3">
    @foreach ($bids as $bid)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <p class="card-text text-center">{{$bid->title}}<br>
            <span>Quantity: {{$bid->quantity}}</span><br>
            <span>Price: BDT{{$bid->price}}</span><br>
            <span>Description: {{$bid->description}}</span><br>
            <span>Status: {{$bid->status}}</span><br>
            <a href="{{route('post.details',['id'=>$bid->id])}}" class="btn btn-primary" style="color:white">Details</a></p>
            </div>
        </div>
    @endforeach
</div> 
@endsection