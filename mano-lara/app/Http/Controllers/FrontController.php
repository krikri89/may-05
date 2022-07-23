<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Color;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\URL;


class FrontController extends Controller
{

    private $perPage = 10;

    public function index(Request $request)
    {

        if ($request->s) { // search part

            list($w1, $w2) = explode(' ', $request->s . ' ');

            $animalsDir = [DB::table('animals')
                ->join('colors', 'colors.id', '=', 'animals.color_id')
                ->select('colors.*', 'animals.*')
                ->where('colors.title', 'like', '%' . $w1 . '%')
                ->where('animals.name', 'like', '%' . $w2 . '%')
                // ->orWhere(function($query) use ($w1, $w2) {
                //     $query->where('colors.title', 'like', '%'.$w2.'%')
                //         ->where('animals.name', 'like', '%'.$w1.'%');
                // })
                ->orWhere(fn ($query) => $query
                    ->where('colors.title', 'like', '%' . $w2 . '%')
                    ->where('animals.name', 'like', '%' . $w1 . '%'))
                ->orWhere(fn ($query) => $query
                    ->where('animals.name', 'like', '%' . $w2 . '%')
                    ->where('animals.name', 'like', '%' . $w1 . '%'))
                ->orderBy('animals.name', 'asc')
                ->get(), 'default'];
            $filter = 0;
        } else { // filter part
            if (!$request->color_id) {

                $allCount = DB::table('animals')
                    ->select(DB::raw('count(animals.id) AS allAnimals, count(DISTINCT(animals.name)) AS allNames'))
                    ->first()->allAnimals;

                $page = $request->page ?? 1; // jeigu nieko nerandam tai atiduodam 1st page, nes 0 nera. 

                $animalsDir = match ($request->sort) {
                    'color-asc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->orderBy('colors.title', 'asc')
                        ->offset(($page - 1) * $this->perPage) // is page - 1 ir * kiek yra perpage. 
                        ->limit($this->perPage) // kiek rodys max = 10 
                        ->get(), 'color-asc'],
                    'color-desc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->orderBy('colors.title', 'desc')
                        ->offset(($page - 1) * $this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'color-desc'],

                    'animal-asc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->orderBy('animals.name', 'asc')
                        ->orderBy('colors.title', 'asc')
                        ->offset(($page - 1) * $this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'animal-asc'],
                    'animal-desc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->orderBy('animals.name', 'desc')
                        ->orderBy('colors.title', 'asc')
                        ->offset(($page - 1) * $this->perPage)
                        ->limit($this->perPage)
                        ->get(), 'animal-desc'],

                    default => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('animals.*', 'colors.*')
                        ->offset(($page - 1) * $this->perPage)
                        ->limit($this->perPage)
                        ->get()->shuffle(), 'default']
                };
                $filter = 0;
            } else { // sort part
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
                        ->orderBy('animals.name', 'asc')
                        ->orderBy('colors.title', 'asc')
                        ->get(), 'animal-asc'],
                    'animal-desc' => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('colors.*', 'animals.*')
                        ->where('animals.color_id', $request->color_id)
                        ->orderBy('animals.name', 'desc')
                        ->orderBy('colors.title', 'asc')
                        ->get(), 'animal-desc'],

                    default => [DB::table('animals')
                        ->join('colors', 'colors.id', '=', 'animals.color_id')
                        ->select('animals.*', 'colors.*')
                        ->where('animals.color_id', $request->color_id)
                        ->get()->shuffle(), 'default']
                };
                $filter = (int) $request->color_id;
            }
        }

        //    dd($animals);

        $parsedUrl = parse_url(url()->full());
        parse_str($parsedUrl['query'] ?? '', $prevQuery);


        return view('front.index', [
            'animals' => $animalsDir[0],
            'sort' => $animalsDir[1],
            'colors' => Color::all(),
            'filter' => $filter,
            's' => $request->s ?? '',
            'allCount' => $allCount ?? 0, //kad nebutu error jei ne ten uzeinam
            'perPage' => $this->perPage ?? 0,
            'prevQuery' => $prevQuery,
            'pageNow' => $page ?? 0,
        ]);
    }
}
