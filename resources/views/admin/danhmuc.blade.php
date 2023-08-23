@extends('admin.layout')
@section('title')
    Danh mục
@endsection


@section('noidung')
    <!-- partial -->
    <div class="main-panel">
        @include('admin.addproduct')
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
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="tab1-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên danh mục</th>
                                            <th>Thứ tự</th>
                                            <th>Ẩn hiện</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhmuc as $product)
                                                <tr>
                                                    <td>{{ $product->ten_loai }}</td>
                                                    <td>{{ $product->thutu }}</td>
                                                    <td>{{ $product->anhien }}</td>
                                                    <td>Sửa, Xóa</td>
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
    </div>
@endsection
