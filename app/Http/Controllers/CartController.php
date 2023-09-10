<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request->product_id;
        $cart->qty = $request->qty;
        $cart->save();

        return redirect('detail/'.$request->product_id)->with('cartinfo', 'one cart add to Cart');
    }

    public function allCart()
    {
        // $carts = Cart::where('user_id', '=', auth()->user()->id)->get();
        $carts = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->select('products.*', 'carts.qty', 'carts.id', 'carts.product_id')
            ->where('carts.user_id', '=', auth()->user()->id)
            ->get();
        $cartsCount = $carts->count();

        return view('cart', compact('carts'));
    }

    public function deleteCart($id)
    {
        Cart::find($id)->delete();

        return redirect('cart')->with('info', 'Cart delete successfully');
    }
}
