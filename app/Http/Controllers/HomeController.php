<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Products::all();

        return view('home', compact('products'));
    }

    public function productDetail($id)
    {
        $product = Products::find($id);
        $products = Products::all();

        return view('detail', compact('product', 'products'));
    }

    public function checkout(Request $request)
    {
        // dd($request->product_id);
        $check = [];
        for ($i = 0; $i < count($request->product_id); $i++) {
            $check[] = [
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id[$i],
                'qty' => $request->qty[$i],
                'price' => $request->price[$i],
                'order_id' => time(),
            ];
            Cart::where('product_id', '=', $request->product_id[$i])
                ->where('user_id', '=', auth()->user()->id)
                ->delete();
            // dd($request->product_id[$i]);
        }

        Order::insert($check);

        return redirect('cart')->with('info', 'successfully checkout');
    }

    public function sendContact(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        return back()->with('info', 'successfully send');
    }
}
