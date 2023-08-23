@extends('layouts.layout')
@section('title')
    Detail
@endsection

@section('detail')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                @foreach ($detail as $item)
                    <div class="col-md-5">
                        <div class="single-product-img">
                            <img src="{{ $item->hinh }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="single-product-content">
                            <h3>{{ $item->ten_sp }}</h3>
                            <p class="single-product-pricing">{{ number_format($item->gia, 0, ',', '.') }} VNĐ</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi
                                cum
                                voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi
                                perferendis
                                eos eum modi! Tempora, earum.</p>
                            <div class="single-product-form">
                                <form action="index.html">
                                    <input type="number" placeholder="0">
                                </form>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                <p><strong>Categories: </strong>{{ $item->ten_loai }}</p>
                            </div>
                            <h4>Share:</h4>
                            <ul class="product-share">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                        <p>Products in the same category</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($category as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="{{$item->hinh}}"
                                        alt=""></a>
                            </div>
                            <h3>{{$item->ten_sp}}</h3>
                            <p class="product-price"> {{ number_format($item->gia, 0, ',', '.') }} VNĐ </p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end more products -->
@endsection

