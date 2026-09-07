@extends('layouts.app')

@section('title', $product['name'])
@section('content')


 <h1>{{$product['name'] }}</h1>

        <p>Price {{$product['price'] }}</p>
        <p>Stock {{$product['stock'] }}</p>
        <p>Tag {{$product['brand'] }}</p>
        <p>Available {{$product['is_available'] }}</p>
        
        <p><a href="{{ route('products.index') }}">Back to List</a></p>

@endsection