@extends('layouts.app')

@section('')
@section('content')

    <p>Prepared by: Jayvee Espanola Alapide</p>
 
    @if ($brand)
       <p>Showing Brand: {{ $brand }}</p>
    @else
    <p>Showing all products</p>
    @endif

      <p>
        <a href="{{ route('products.filter', 'sunsilk') }}">SUNSILK</a> |
        <a href="{{ route('products.filter', 'choco') }}">CHOCO</a> |
        <a href="{{ route('products.filter', 'dishwashing') }}">DISHWASHING</a> |
        <a href="{{ route('products.filter', 'nescafe') }}">NESCAFE</a> |
        <a href="{{ route('products.filter', 'mint') }}">MINT</a>
     </p>
    <table class="table table-borderd table-striped" border="1" cellpadding="8">
    
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Brand</th>
            <th>Available</th>
        </tr>
 
        @forelse ($products as $product)
            <tr>

                <td>{{ $loop->iteration }}</td>

                <td><a href="/products/{{$product['id']}}"> {{ $product['name']}}</a></td>
                <td>{{ $product['price'] }}</td>
                <td>{{ $product['stock'] }}</td>
                <td>{{ $product['brand'] }}</td>
                <td>{{ $product['is_available'] ? 'Yes' : 'No' }}</td>
                
            </tr>
            @empty
            <tr><td colspan="6">No Brand Matched this filter: {{ $brand }}</td></tr>
        @endforelse

@endsection