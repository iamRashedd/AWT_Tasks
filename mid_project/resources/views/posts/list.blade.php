@extends('layouts.app')
@section('content')
<div class="col-md-3">
    @foreach ($posts as $post)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="public/assets/uploads/{{$post->photo}}" alt="Card image cap">
            <div class="card-body">
            <p class="card-text text-center">{{$post->title}}<br>
            <span>Quantity: {{$post->quantity}}</span><br>
            <span>Price: BDT{{$post->price}}</span><br>
            <span>Description: {{$post->description}}</span><br>
            <span>Status: {{$post->status}}</span><br>
            <a href="{{route('seller.bid',['id'=>$post->id])}}" class="btn btn-primary" style="color:white">Bid</a>
            
            <a href="{{route('post.details',['id'=>$post->id])}}" class="btn btn-primary" style="color:white">Details</a></p>
            </div>
        </div>
    @endforeach
</div> 
@endsection