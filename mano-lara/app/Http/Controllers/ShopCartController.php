<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

use function GuzzleHttp\default_ca_bundle;

class ShopCartController extends Controller
{
    public function add(Request $request)
    {
        $count = (int) $request->count;
        $id = (int) $request->animalId;

        $cart = session()->get('cart', []); // pasiemam cart

        //paskaiciuojam tuos pacius items vienas prie kito 
        switch (1) {
            case 1:
                foreach ($cart as &$item) {
                    if ($item['id'] == $id) { // jeigu randamas id jau yra tai prideti prie esamu
                        $item['count'] += $count;
                        break 2; // break 2 levels 
                    }
                }
            default:
                $cart[] = ['id' => $id, 'count' => $count]; //i cart dedam

        }



        session()->put('cart', $cart);



        return response()->json([
            'msg' => 'Nieko nesuprantu'
        ]);
    }

    public function showSmallCart()
    {
        $cart = session()->get('cart', []); //cia cart yra masyvas

        $ids = array_map(fn ($product) => $product['id'], $cart); //sukuria nauma masyva, kuris susidaro is ids

        //kad suskaiciuoti kiek cart yra products. cart paverciam i collection:
        $cartCollection = collect([...$cart]); // sukuriam collection. ... spread masyva i atskirus masyvus ir sudedami i collection object. 

        $animals = Animal::whereIn('id', $ids)->get() // einam i animal object lentele ir is jos islupame animalus kuriu id yra surasyti i IDS masyvus. 
            ->map(function ($a)  //visa collection su visais animals($a) mapinam
            use ($cartCollection) { // use kintamaji, nes kadangi tai nera arrow function ir outside kintamieji negali kitaip patekti i paprasta function
                $a->count // ir tada i animal pridedame papildoma kintamaji count
                    = $cartCollection->first(fn ($el) => $el['id'] == $a->id) // is cartCollection randame pirma pagal taisykle kad sitame masyve id = animal kuri mes mapinam id
                    ['count']; // ir grazinam count i $a->count objecta ir ji grazinam
                return $a;
            }); // 

        $all = count($cart);

        $html = view('front.cart')->with([
            'count' => $all,
            'cart' => $animals // paduodam kintamuosius kuriu reikes renderinan cart blade
        ])->render();

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
