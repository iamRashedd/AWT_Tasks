@extends('layouts.app')
@section('content')
    <div>
        <h1>Products</h1>

        @foreach ($products as $p)
            <li>
                <strong>{{ 'Product Name: ' }}</strong>
                {{ $p->name }}

                <strong>{{ 'Product Type: ' }}</strong>
                {{ $p->type }}

                <strong>{{ 'Product Price: ' }}</strong>
                {{ $p->price }}


            </li>
        @endforeach
    </div>
@endsection
