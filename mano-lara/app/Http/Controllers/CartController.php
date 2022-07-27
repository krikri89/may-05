<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $orders = Cart::orderBy('id', 'desc')->get();

        return view('adminOrders.index', ['orders' => $orders]);
    }
    public function add(Request $request)
    {


        // dd($request->all());

        $cart = new Cart;
        $cart->count = $request->animals_count;
        $cart->animal_id = $request->animal_id;
        $cart->user_id = Auth::user()->id;

        $cart->save();
        return redirect()->route('my-order');
    }
    public function showMyOrder()
    {
        $orders = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('front.orders', ['orders' => $orders]);
    }
}
