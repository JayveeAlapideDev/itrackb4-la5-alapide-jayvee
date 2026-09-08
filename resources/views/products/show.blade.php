@extends('layouts.app')

@section('title', $product['name'])
@section('content')

<header class="bg-white">
 <h1>{{$product['name'] }}</h1>

        <p>Price {{$product['price'] }}</p>
        <p>Stock {{$product['stock'] }}</p>
        <p>Tag {{$product['brand'] }}</p>
        <p>Available {{$product['is_available'] }}</p>
</header>
          <p><a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a></p>-
@endsection