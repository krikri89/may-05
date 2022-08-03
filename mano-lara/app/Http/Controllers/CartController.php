<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Animal;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $orders = Cart::orderBy('id', 'desc')->get();

        $orders->map(function ($ord) { //map ir cart paimu orderi
            $cart = json_decode($ord->order, 1);
            $ids = array_map(fn ($product) => $product['id'], $cart);
            $cartCollection = collect([...$cart]); //kiekvienas cart gauna animal collection. KAdangi jis jau sujungtas su color, todel galioja visi  

            $ord->animals = Animal::whereIn('id', $ids)->get()->map(function ($a) use ($cartCollection) {
                $a->count = $cartCollection->first(fn ($el) => $el['id'] == $a->id)['count'];
                return $a;
            });
            return $ord;
        });

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
        // $cart->count = $request->animals_count; //sita dali ismetam kai darom pdf
        $cart->order = json_encode(session()->get('cart', [])); // I orderi idedam cart padaryta su Json . Si ta dalis pridedam del pdf
        session()->put('cart', []); // tada patustinam. 


        // $cart->animal_id = $request->animal_id;//sita dali ismetam kai darom pdf
        $cart->user_id = Auth::user()->id;

        $cart->save();
        return redirect()->route('my-order');
    }
    public function showMyOrder()
    {
        $orders = Cart::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();


        $orders->map(function ($ord) { //map ir cart paimu orderi
            $cart = json_decode($ord->order, 1);
            $ids = array_map(fn ($product) => $product['id'], $cart);
            $cartCollection = collect([...$cart]); //kiekvienas cart gauna animal collection. KAdangi jis jau sujungtas su color, todel galioja visi  

            $ord->animals = Animal::whereIn('id', $ids)->get()->map(function ($a) use ($cartCollection) {
                $a->count = $cartCollection->first(fn ($el) => $el['id'] == $a->id)['count'];
                return $a;
            });
            return $ord;
        });



        $orders = $orders->map(function ($o) {

            $time = Carbon::create($o->created_at); //is created at padarytas carbon object, kuri paskui galima pasidaryti skirtingu formatu
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
    // public function getPdf(Cart $order)
    // {
    //     $cart = json_decode($order->order, 1); //gaunam orderi, to orderio cart 
    //     $ids = array_map(fn ($product) => $product['id'], $cart); // geting ids
    //     $cartCollection = collect([...$cart]); //kiekvienas cart gauna animal collection. KAdangi jis jau sujungtas su color, todel galioja visi  

    //     $order->animals = Animal::whereIn('id', $ids)->get()->map(function ($a) use ($cartCollection) {
    //         $a->count = $cartCollection->first(fn ($el) => $el['id'] == $a->id)['count'];
    //         return $a;
    //     });
    //     $pdf = Pdf::loadView('front.pdf', ['cart' => $order]);
    //     return $pdf->download('order-' . $order->id . '.pdf');
    //     // pdf pavadinimas
    // }
}
