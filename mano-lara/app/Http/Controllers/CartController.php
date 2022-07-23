<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // dd($request->all());

        $cart = new Cart;
        $cart->count = $request->animals_count;
        $cart->animal_id = $request->animal_id;
        $cart->user_id = Auth::user()->id;

        $cart->save();
    }
}
