@extends('layouts.main')
@section('title')
    Home
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <h3><span class="orange-text">Best</span> Selling</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $products)
            <div class="col-lg-4 col-md-6 text-center">

                <div class="single-product-item">

                    <div class="product-image">
                        <a href="single-product.html"><img src="{{ $products->hinh }}" alt=""></a>
                    </div>
                    <h3>{{ $products->ten_sp }}</h3>
                    <p class="product-price"><span>{{ number_format($products->gia, 0, ',', '.') }}</span> </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
