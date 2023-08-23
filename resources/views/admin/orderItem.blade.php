@extends('admin.layout')

@section('title')
    Quản lý sản phẩm
@endsection

@section('noidung')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-end flex-wrap">
                            <div class="mr-md-3 mr-xl-5">
                                <h2>Welcome back,</h2>
                                <p class="mb-md-0">Your analytics dashboard template.</p>
                            </div>
                            <div class="d-flex">
                                <i class="mdi mdi-home text-muted hover-cursor"></i>
                                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                <p class="text-primary mb-0 hover-cursor">Analytics</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hóa đơn chi tiết | <a href="/admin/restore"
                                    style="text-decoration:none; color:black; ">Quay Lại</a></h4>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Mã đơn hàng</th>
                                            <th class="text-center">Tên người nhận</th>
                                            <th class="text-center">Ảnh sản phẩm</th>
                                            <th>Vật phẩm</th>
                                            <th>Giá</th>
                                            <th class="text-center">Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->id_dh }}</td>
                                                <td class="text-center">{{ $donhang->name }}</td>
                                                <td class="text-center">
                                                    @foreach ($sanphams as $sanpham)
                                                        @if ($sanpham->id_sp == $item->id_sp)
                                                            <img src="{{ $sanpham->hinh }}" alt="">
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $item->ten_sp }} <span
                                                        class="text-danger">x{{ $item->soluong }}</span></td>
                                                <td>{{ number_format($item->gia) }} ₫</td>
                                                <td class="text-center">{{ number_format($item->gia * $item->soluong) }} ₫
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a
                        href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                        class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
    </div>
    <!-- main-panel ends -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
<!-- JavaScript -->
