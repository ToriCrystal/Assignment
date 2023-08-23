@extends('layouts.layout')
@section('title')
    Cart
@endsection

@section('detail')
    <!-- cart -->
    <div class="cart-section mt-150 mb-150" id="cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table id="cart" class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Hình sản phẩm</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-price">Tổng giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session('cart') != null)
                                    @foreach (session('cart') as $id => $details)
                                        <tr data-id="{{ $id }}" class="table-body-row">
                                            <td>
                                                <button class="btn btn-danger btn-sm cart_remove">
                                                    <i class="far fa-window-close"></i>
                                                </button>
                                            </td>
                                            </td>
                                            <td class="product-image"><img src="{{ $details['hinh'] }}" alt=""></td>
                                            <td class="product-name">{{ $details['ten_sp'] }}</td>
                                            <td class="product-price">{{ number_format($details['gia'], 0, ',', '.') }} VNĐ
                                            </td>
                                            <td data-th="quantity" class="product-quantity"><input type="number"
                                                    placeholder="{{ $details['soluong'] }}" class="quantity cart_update"
                                                    min="1"></td>
                                            @php $total = 0 @endphp
                                            @php $total += $details['gia'] * $details['soluong'] @endphp
                                            <td class="product-price">
                                                {{ number_format($total, 0, ',', '.') }} VNĐ
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    @php $total = 0 @endphp
                                    @foreach ((array) session('cart') as $id => $details)
                                        @php $total += $details['gia'] * $details['soluong'] @endphp
                                    @endforeach
                                    <td>{{ number_format($total, 0, ',', '.') }} VNĐ</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>$45</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>$545</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <form action="/session" method="post">
                                <div class="mb-3">
                                    <label for="tennguoinhan" class="form-label">Họ và tên</label>
                                    <input type="text" name="tennguoinhan" class="form-control" id="tennguoinhan"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dienthoai" class="form-label">Số điện thoại</label>
                                    <input type="text" name="dienthoai" class="form-control" id="dienthoai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="diachigiaohang" class="form-label">Địa chỉ giao hàng</label>
                                    <input type="text" name="diachigiaohang" class="form-control" id="diachigiaohang" required>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn boxed-btn black" type="submit" id="checkout-live-button"><i
                                        class="fa fa-money"></i> Checkout</button>
                            </form>
                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.html">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
@endsection


@section('scripts')
    <script>
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });


        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
