<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //index
    function index()
    {
    	$data = Product::all();
    	return view('product', ['products'=>$data]);
    }
    //detail barang
    function details($id)
    {
    	$data = Product::find($id);
    	return view('detail',['product'=>$data]);
    }
    //kolom cari
    function search(Request $req)
    {
        $data = Product::where('name','like', '%'.$req->input('query').'%')->get();
        return view('search', ['products'=>$data]);
    }
    //keranjang 
    function keranjang(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }
    //keranjang_barang
    static function keranjang_barang()
    {
        $userId=Session::get('user')['id'];  
        return Cart::where('user_id', $userId)->count(); 
    }
    function daftar_barang()
    {
        $userId=Session::get('user')['id'];
        $products= DB::table('cart')
        ->join('products' , 'cart.product_id' , '=' , 'products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('daftar_barang',['products'=>$products]);
    }
    function hapus($id)
    {
        Cart::destroy($id);
        return redirect('/daftar_barang');
    }
    function Order()
    {
        $userId=Session::get('user')['id'];
        $total = $products= DB::table('cart')
        ->join('products' , 'cart.product_id' , '=' , 'products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');

        return view('order',['total'=>$total]);
        // return view('order');
    }
    function checkout(Request $req)
    {
        $userId=Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->pay_method=$req->pay;
            $order->pay_status="pending";
            $order->alamat=$req->alamat;
            $order->save(); 
            Cart::where('user_id',$userId)->delete();
        }
        $req->input();
        return redirect('/');
    }
    function myorder()
    { 
         $userId = Session::get('user')['id'];
         $order = DB::table('orders')
        ->join('products' , 'orders.product_id' , '=' , 'products.id')
        ->where('orders.user_id',$userId)
        ->get();

        return view('myorder',['order'=>$order]);
    }
}
