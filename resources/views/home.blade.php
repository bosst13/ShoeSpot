@extends('layouts.header')
@section('content')
    <section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
        <div class="container">
            <div class="row">
                <div class="display-header d-flex justify-content-between pb-3">
                    <h2 class="display-7 text-dark text-uppercase">Products</h2>
                    <div class="btn-right">
                        <a href="customer/shop" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
                    </div>
                </div>
                <div class="swiper product-swiper">
                    <div class="swiper-wrapper">
                        @foreach($products as $product)
                        <div class="swiper-slide">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="customer/images/product-item1.jpg" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex flex-column"> <!-- Change here -->
                                        <a href="{{route('products.info', ['product' => $product])}}" class="btn btn-medium btn-black">View Product<svg class="cart-outline">
                                                <use xlink:href="#cart-outline"></use>
                                            </svg></a>
                                        <form action="{{ route('cart.add', $product->product_id) }}" method="GET" class="mt-2">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-10 mt-1 mt-md-0"> <!-- Change here -->
                                                    <button type="submit" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                                                            <use xlink:href="#cart-outline"></use>
                                                        </svg></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>                                
                                
                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="#">{{$product->product_name}}</a>
                                    </h3>
                                    <span class="item-price text-primary">₱{{$product->sell_price}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination position-absolute text-center"></div>
    </section> 
    @if(session('success'))
    <div class="success-message" style="position: absolute; top: 60px; left: 50%; transform: translateX(-50%); z-index: 9999; background-color: #dff0d8; padding: 10px 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        {{ session('success') }}
    </div>
@endif   
</body>

@endsection
