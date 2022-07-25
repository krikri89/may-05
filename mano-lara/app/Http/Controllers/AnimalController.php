<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Animal;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $animals = Animal::all();

        return view('animal.index', ['animals' => $animals]);
        // $colors = Color::all()->sortByDesc('title');
        // $colors = Color::where('id', '<', 100)->orderBy('title')->get();

        $colors = match ($request->sort) {
            'asc' => Color::orderBy('title', 'asc')->get(),
            'desc' => Color::orderBy('title', 'desc')->get(),
            default => Color::all()
        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();

        return view('animal.create', ['colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = new Animal;
        if ($request->file('animal_photo')) { // jeigu file yra

            $photo = $request->file('animal_photo');
            $extension = $photo->getClientOriginalExtension(); // kadangi gaunam object, pasiimam extension, tan kad galetume padaryti linka
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME); //originalus vardas w/o extension. kad eitu prideti extension kuriant nauja varda
            $file = $name . '-' . rand(100000, 999999) . '.' . $extension; // generuojam file varda. Del saugumo ji pervadiname. orgin name + bruksnys + rand number + taskas + origin extend

            $Image = Image::make($photo)->greyscale();

            // $Image->save($originalPath . time() . $photo->getClientOriginalName());

            $Image->move(public_path() . '/images', $file);

            // $photo->move(public_path() . '/images', $file); // kur norim ideti sia photo. su pavadinimu kuri sukuriam su $file
            $animal->photo = asset('/images') . '/' . $file; // i DB photo dali lenteleje

        }

        $animal->name = $request->animal_name;

        $animal->color_id = $request->color_id;

        $animal->save();

        return redirect()->route('animals-index')->with('success', 'Well done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(int $animalId)
    {
        $animal = Animal::where('id', $animalId)->first();

        return view('animal.show', ['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {

        $colors = Color::all();

        return view('animal.edit', [
            'animal' => $animal,
            'colors' => $colors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        if ($request->file('animal_photo')) { // jeigu file yra

            // istrinam is DB
            $name = pathinfo($animal->photo, PATHINFO_FILENAME);
            $extension = pathinfo($animal->photo, PATHINFO_EXTENSION);
            $path = asset('/images') . '/' . $name . '.' . $extension;

            if (file_exists($path)) {
                unlink($path);
            }
            // idedam nauja

            $photo = $request->file('animal_photo');
            $extension = $photo->getClientOriginalExtension(); // kadangi gaunam object, pasiimam extension, tan kad galetume padaryti linka
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME); //originalus vardas w/o extension. kad eitu prideti extension kuriant nauja varda
            $file = $name . '-' . rand(100000, 999999) . '.' . $extension; // generuojam file varda. Del saugumo ji pervadiname. orgin name + bruksnys + rand number + taskas + origin extend
            $photo->move(public_path() . '/images', $file); // kur norim ideti sia photo. su pavadinimu kuri sukuriam su $file
            $animal->photo = asset('/images') . '/' . $file; // i DB photo dali lenteleje

        }
        $animal->name = $request->animal_name;

        $animal->color_id = $request->color_id;

        $animal->save();

        return redirect()->route('animals-index')->with('success', 'You are the best!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        // istrinam is DB
        if ($animal->photo) {
            $name = pathinfo($animal->photo, PATHINFO_FILENAME);
            $extension = pathinfo($animal->photo, PATHINFO_EXTENSION);
            $path = asset('/images') . '/' . $name . '.' . $extension;

            if (file_exists($path)) {
                unlink($path);
            }
        }
        $animal->delete();

        return redirect()->route('animals-index')->with('deleted', 'Animal is dead :(');
    }
    public function deletePic(Animal $animal)
    {
        // istrinam is DB
        $name = pathinfo($animal->photo, PATHINFO_FILENAME);
        $extension = pathinfo($animal->photo, PATHINFO_EXTENSION);
        $path = asset('/images') . '/' . $name . '.' . $extension;

        if (file_exists($path)) {
            unlink($path);
        }
        //istrinam is musu filo
        $animal->photo = null; // pic padarom null
        $animal->save();


        return redirect()->back()->with('deleted', 'No more pics');
    }
}
