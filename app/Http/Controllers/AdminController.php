<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Danhmuc;
use App\Models\OrderItem;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function taikhoan()
    {
        $taikhoan = User::paginate(10);
        return view('admin.taikhoan', compact('taikhoan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function danhmuc()
    {
        $danhmuc = Danhmuc::paginate(10);
        return view('admin.danhmuc', compact('danhmuc'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function product()
    {
        $product = Product::paginate(10);
        return view('admin.product', compact('product'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function xoaproduct($id)
    {

        $sanpham = product::find($id);
        if ($sanpham == null) return Redirect('/thongbao');
        $sanpham->delete();
        return back();
    }

    function editss(Request $request, $id_sp)
    {
        $sanpham = Product::find($id_sp);
        if ($sanpham == null) return Redirect('/thongbao');
        return view('admin/editss', ['sanpham' => $sanpham]);
    }
    function updateSanPham(Request $request, $id_sp)
    {
        $sanpham = Product::find($id_sp);
        if ($sanpham == null) return Redirect('/thongbao');
        $sanpham->ten_sp = $_POST['ten_sp'];
        $sanpham->gia = $_POST['gia'];
        // $sanpham->urlHinh = $_POST['upload/images/'.'urlHinh'];
        $sanpham->gia_km = $_POST['gia_km'];
        $sanpham->hinh = 'upload/images/' . $_POST['hinh'];
        $sanpham->save();
        return Redirect('admin/sanpham');
    }


    public function donhang()
    {
        $donhang = Order::join('users', 'users.id', '=', 'donhang.id_user')
            ->select('donhang.*', 'users.name')
            ->paginate(10);
        return view('admin.donhang', compact('donhang'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function restore()
    {

        return redirect('admin/donhang');
    }


    function orderItem($id_dh)
    {
        $order = Order::with('items')->find($id_dh);

        if (!$order) {
            return redirect()->route('admin.allorder')->with('error', 'Không tìm thấy đơn hàng.');
        }

        $donhang = Order::join('users', 'users.id', '=', 'donhang.id_user')
            ->select('donhang.*', 'users.name')
            ->where('donhang.id_dh', $id_dh)
            ->first();

        // Lấy danh sách sản phẩm liên quan trong đơn hàng
        $sanphams = Product::join('donhangchitiet', 'donhangchitiet.id_sp', '=', 'sanpham.id_sp')
            ->whereIn('donhangchitiet.id_dh', [$id_dh])
            ->select('donhangchitiet.*', 'sanpham.hinh')
            ->get();

        dd($donhang, $sanphams);
        return view('admin.orderItem', compact('order', 'donhang', 'sanphams'));
    }

    public function thayDoiTrangThai(Request $request)
    {
        $orderId = $request->input('id_dh');
        $newStatus = 0; // Thay đổi thành trạng thái 1 (Đang vận chuyển), bạn có thể thay đổi tùy theo trường hợp

        $order = Order::findOrFail($orderId);

        if ($order) {
            if ($order->trangthai == 0) {
                $newStatus = 1;
            } elseif ($order->trangthai == 1) {
                $newStatus = 2;
            }

            $order->trangthai = $newStatus;
            $order->save();

            return redirect()->back();
        }
    }
}
