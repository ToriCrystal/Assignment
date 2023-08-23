@extends('layouts.layout')
@section('title')
    Product
@endsection

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($listloai as $Brain)
                                <li data-filter="">{{ $Brain->ten_loai }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> --}}

            <div class="row product-lists">
                @foreach ($category as $cat)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/detail/{{ $cat->id_sp }}/{{ $cat->id_loai }}"><img src="{{ $cat->hinh }}" alt=""></a>
                            </div>
                            <h3>{{ $cat->ten_sp }}</h3>
                            <p class="product-price"><span></span> {{ number_format($cat->gia, 0, ',', '.') }} VNĐ</p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">{{ $category->onEachSide(3)->links() }}</a></li>
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
