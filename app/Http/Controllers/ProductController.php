<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

Paginator::useBootstrap();

use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $listloai = DB::table('loai')
            ->where('anhien', 1)
            ->orderBy('thutu', 'asc')
            ->get();
        \View::share('listloai', $listloai);
    }
    
    public function index()
    {
        $products = Product::orderBy('soluotxem', 'desc')
            ->limit(6)->get();
        return view('index', compact('products'));

        // return view('index', ['bestselling' => $bestselling]);
    }

    // public function product(){

    // }

    public function detail($id, $idloai)
    {
        $detail = DB::table('sanpham')
            ->join('loai', 'loai.id_loai', '=', 'sanpham.id_loai')
            ->where('id_sp', $id)
            ->select('sanpham.*', 'loai.*')
            ->get();


        $category = DB::table('sanpham')
            ->join('loai', 'sanpham.id_loai', '=', 'loai.id_loai')
            ->where('loai.id_loai', $idloai)
            ->limit(3)
            ->get();

        return view('detail', ['detail' => $detail], ['category' => $category]);
    }

    public function product()
    {
        $product = DB::table('sanpham')
            ->where('anhien', 1)->limit(12)->get();
        return view('product', ['product' => $product]);
    }

    public function category($id = 0)
    {
        $perpage = 12;
        $category = DB::table('sanpham')
            ->where('id_loai', $id)
            ->where('anhien', 1)
            ->limit(12)
            ->paginate($perpage)->withQueryString();
        return view('category', ['category' => $category]);
    }

    public function search($tk = "a")
    {
        return view('search');
    }

    public function login()
    {
        return view('login');
    }
}
