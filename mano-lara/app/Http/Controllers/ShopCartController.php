<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class ShopCartController extends Controller
{
    public function add(Request $request)
    {
        $count = (int) $request->count;
        $id = (int) $request->animalId;

        $cart = session()->get('cart', []); // pasiemam cart
        $cart[] = ['id' => $id, 'count' => $count]; //i cart dedam

        session()->put('cart', $cart);



        return response()->json([
            'msg' => 'Nieko nesuprantu'
        ]);
    }

    public function showSmallCart()
    {
        $cart = session()->get('cart', []);
        $all = count($cart);
        $html = view('front.cart')->with(['count' => $all])->render();

        return response()->json([
            'html' => $html
        ]);
    }
    public function deleteSmallCart()
    {
        session()->put('cart', []);

        return response()->json([
            'msg' => 'Durnas ats'
        ]);
    }
}
