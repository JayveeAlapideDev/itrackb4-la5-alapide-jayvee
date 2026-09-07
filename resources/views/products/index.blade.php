@extends('layouts.app')

@section('title', 'All Products')
@section('content')


 <h3>Products in my Store</h3>
    <p>Prepared by: Jayvee Espanola Alapide</p>
 
    <table border="1" cellpadding="8">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Brand</th>
            <th>Available</th>
        </tr>
 
        @foreach ($products as $product)
            <tr>
                <td><a href="{{ route('products.show', $product['id'])}}"> {{ $product['name']}}</a></td>
                <td>{{ $product['price'] }}</td>
                <td>{{ $product['stock'] }}</td>
                <td>{{ $product['brand'] }}</td>
                <td>{{ $product['is_available'] ? 'Yes' : 'No' }}</td>
                
            </tr>
        @endforeach
    </table>

@endsection


