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
        switch (1) { //ateinam is witch ir gaunam 1. 
            case 1: // tikrinam ar tirkai gaunam 1, o kadangi visada vienetas, tai prasuks foreach.
                foreach ($cart as &$item) {
                    if ($item['id'] == $id) { // jeigu randamas id jau yra tai prideti prie esamu
                        $item['count'] += $count;
                        break 2; // break 2 levels 1as break nubreakins foreach ir iseis is jo, o 2as iseis is swithco, todel nepateks i default. 
                    }
                }
            default:
                $cart[] = ['id' => $id, 'count' => $count];
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
    public function deleteSmallCart(Request $request)
    {

        $cart = session()->get('cart', []);
        $id = (int) $request->id;

        foreach ($cart as $key => $item) { //reikia foreach kad session neistrintu visko kiekviena karta kai padarom page refresh 
            if ($id == $item['id']) { //jeigu item = id
                unset($cart[$key]); // ji istrinam
                break;
            }
        }
        session()->put('cart', $cart);

        return response()->json([
            'msg' => 'Durnas ats'
        ]);
    }
}
