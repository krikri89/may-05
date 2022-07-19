<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Animal;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->color_id) { //jeigu is rqst negaunam color_id, tada naudojam si match
            $animalsDir = match ($request->sort) {
                'color-asc' => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id') // colors.id ->is lenteles colors paimam id ir sujungiam su kitos id
                    ->select('colors.*', 'animals.*') //* viska is abieju lenteliu
                    ->orderBy('colors.title', 'asc')
                    ->get(), 'color-asc'],
                'color-desc' => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->orderBy('colors.title', 'desc')
                    ->get(), 'color-desc'],
                'animal-asc' => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->orderBy('animals.name', 'asc') //pagal animals name
                    ->orderBy('colors.title', 'asc')
                    ->get(), 'animal-asc'],
                'animal-desc' => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->orderBy('animals.name', 'desc')
                    ->orderBy('colors.title', 'desc')
                    ->get(), 'animal-desc'],

                default => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('animals.*', 'colors.*')
                    ->get()->shuffle(), 'default'],
            };
            $filter = 0;
        } else {
            $animalsDir = match ($request->sort) {
                'color-asc' => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->where('animals.color_id', $request->color_id)
                    ->orderBy('colors.title', 'asc')
                    ->get(), 'color-asc'],
                'color-desc' => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->where('animals.color_id', $request->color_id)
                    ->orderBy('colors.title', 'desc')
                    ->get(), 'color-desc'],
                'animal-asc' => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->where('animals.color_id', $request->color_id)
                    ->orderBy('animals.name', 'asc') //pagal animals name
                    ->orderBy('colors.title', 'asc')
                    ->get(), 'animal-asc'],
                'animal-desc' => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('colors.*', 'animals.*')
                    ->where('animals.color_id', $request->color_id)
                    ->orderBy('animals.name', 'desc')
                    ->orderBy('colors.title', 'desc')
                    ->get(), 'animal-desc'],

                default => [DB::table('animals')
                    ->join('colors', 'colors.id', '=', 'animals.color_id')
                    ->select('animals.*', 'colors.*')
                    ->where('animals.color_id', $request->color_id)
                    ->get()->shuffle(), 'default'],
            };
            $filter = (int)$request->color_id;
        }
        return view('front.index', [
            'animals' => $animalsDir[0],
            'sort' => $animalsDir[1],
            'colors' => Color::all(),
            'filter' => $filter,
        ]);
    }
}
