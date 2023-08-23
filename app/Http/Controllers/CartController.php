<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

Paginator::useBootstrap();

use DB;

class CartController extends Controller
{
    public function __construct()
    {
        $listloai = DB::table('loai')
            ->where('anhien', 1)
            ->orderBy('thutu', 'asc')
            ->get();
        \View::share('listloai', $listloai);
    }

    public function cart()
    {
        return view('cart');
    }

    public function addsp(Request $request) {

    }

    public function about()
    {
        return view('about');
    }

    public function addtocart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        if (!isset($cart[$id])) {
            $cart[$id] = [
                "ten_sp" => $product->ten_sp,
                "hinh" => $product->hinh,
                "gia" => $product->gia,
                "soluong" => 1
            ];
        } else {
            $cart[$id]['soluong']++;
        }

        session()->put('cart', $cart);
        // dd($cart);
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["soluong"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
}
