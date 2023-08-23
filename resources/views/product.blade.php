@extends('layouts.layout')
@section('title')
    Product
@endsection

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row product-lists">
                @foreach ($product as $product)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/detail/{{ $product->id_sp }}/{{ $product->id_loai }}"><img
                                        src="{{ $product->hinh }}" alt=""></a>
                            </div>
                            <h3>{{ $product->ten_sp }}</h3>
                            <p class="product-price"><span></span> {{ number_format($product->gia, 0, ',', '.') }} VNĐ</p>
                            <a href="/add-to-cart/{{ $product->id_sp }}"  class="cart-btn"><i class="fas fa-shopping-cart"></i>
                                Add to Cart</a>
                        </div>  
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
