@extends('layouts.header')
@section('content')
<body>
    <div class="container">
        <div class="product-info">
            <div class="product-image">
                <img src="{{ $product->image }}" alt="Product Image">
            </div>
            <h2>Product Name: {{ $product->product_name }}</h2>
            <p class="price">Price: ${{ $product->sell_price }}</p>
            <p>Description: {{ $product->description }}</p>
            <p>Brand: {{ $product->brand }}</p>
            <p>Category: {{ $product->category }}</p>
            <div class="product-buttons">
                <form action="{{ route('products.order', ['product' => $product]) }}" method="GET">
                    @csrf
                    <button type="submit" class="product-button">Order Now</button>
                </form>
                <button class="product-button">Add to Cart</button>
            </div>
        </div>
    </div>
</body>
@endsection