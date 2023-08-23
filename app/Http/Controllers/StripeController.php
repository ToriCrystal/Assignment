<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class StripeController extends Controller
{
        public function session(Request $request)
        {
            $user_id = auth()->user()->id; // Lấy ID người dùng đã đăng nhập
            $cartItems = session('cart');
            

            // Tạo đơn hàng
            $order = Order::create([
                'id_user' => $user_id,
                'thoidiemmua' => now(),
                'tennguoinhan' => $request->input('tennguoinhan'),
                'dienthoai' => $request->input('dienthoai'),
                'diachigiaohang' => $request->input('diachigiaohang')
            ]);
            if ($cartItems !== null) {
                foreach ($cartItems as $id => $details) {
                    $order->items()->create([
                        'id_sp' => $id,
                        'ten_sp' => $details['ten_sp'],
                        'soluong' => $details['soluong'],
                        'gia' => $details['gia']
                    ]);
                }
            } else {
                return back();
            }

        
            // Xóa giỏ hàng sau khi tạo đơn hàng
            session()->forget('cart');

            return redirect()->back()->with('success', 'Đơn hàng đã được tạo thành công.');
        }
}
