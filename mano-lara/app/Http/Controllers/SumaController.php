<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class SumaController extends Controller
{
    public function suma($a = 0, $b = 0)
    {
        $ab =  $a + $b;

        return view('suma', ['rezultatas' => $ab]);
    }

    public function skirtumas(Request $request)
    {
        $colors = Color::all(); // norint atspausdint visus rez
        
        $rodyti = $request->session()->get('rezultatas', '');
        
        return view('post.form', [
            'ro' => $rodyti,

            'colors' => $colors
        ]);
    }

    public function skaiciuoti(Request $request)
    {
        $rez = $request->x - $request->y;
        return redirect()->route('forma')->with('rezultatas', $rez);

        $color = new Color; // new object
        $color->color = $rez; // i color stulpeli irasom rez
        $color->save();
        dump($rez);
    }
}
