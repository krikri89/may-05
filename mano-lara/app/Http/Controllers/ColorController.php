<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;


class ColorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $colors = match ($request->sort) {
            'asc' => Color::orderBy('title', 'asc')->get(),
            'desc' => Color::orderBy('title', 'desc')->get(),
            default => Color::all()
        };
        // $colors = Color::where('id', '<', 100)->orderBy('title')->get();

        // $colors = Color::all()->sortBy('title');


        return view('color.index', ['colors' => $colors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = new Color;

        $color->color = $request->create_color_input;
        $color->title = $request->create_color_title ?? 'no title';

        $color->save();

        return redirect()->route('colors-index')->with('success', 'Great job!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(int $colorId)
    {
        $color = Color::where('id', $colorId)->first();

        return view('color.show', ['color' => $color]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('color.edit', ['color' => $color]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $color->color = $request->create_color_input;
        $color->title = $request->create_color_title ?? 'no title';

        $color->save();

        return redirect()->route('colors-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        if (!$color->animals->count()) {

            $color->delete();
            return redirect()->route('colors-index')->with('deleted', 'COlor gone');
        }

        return redirect()->back()->with('deleted', 'not possible');
    }
}