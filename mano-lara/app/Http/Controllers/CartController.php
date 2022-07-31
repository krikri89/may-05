<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $orders = Cart::orderBy('id', 'desc')->get();

        return view('adminOrders.index', [
            'orders' => $orders,
            'statuses' => Cart::STATUSES

        ]);
    }

    public function setStatus(Request $request, Cart $order)
    {
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
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

        $orders = $orders->map(function ($o) {

            $time = Carbon::create($o->created_at)->setTimezone('Europe / Vilnius'); //is created at padarytas carbon object, kuri paskui galima pasidaryti skirtingu formatu
            // $time->addDays(7)->addHours();
            // $time->next('Monday')->addHour('12');

            $o->time = $time->format('Y-m-d H:i');
            return $o;
        });


        return view('front.orders', [
            'orders' => $orders,
            'statuses' => Cart::STATUSES
        ]);
    }
}
