<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Dish;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        //$dishes = Dish::all();
        $dishes = DB::table('dishes')->where('restaurant_id', $user_id)->get();

        return view('dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dish = new Dish();
        return view('dishes.create', compact('dish'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|min:2|max:50',
                'description' => 'required|max:255',
                'entry' => 'required|max:50',
                'picture' => 'nullable|mimes:jpeg,png',
                'price' => 'required|numeric',
            ],
            [
                'required' => 'Questo campo è obbligatorio',
                'image.mimes' => 'Il file dev\'essere in formato .jpg o .png'
            ]
        );



        $data = $request->all();
        $newDish = new Dish();
        $newDish->fill($data);
        //! Se vi segna un errore su Auth non fateci caso
        $newDish->restaurant_id = Auth::id();

        // Controllo se ho ricevuto i checkbox
        $gluten_free = isset($request->gluten_free) ? 1 : 0;
        $vegan = isset($request->vegan) ? 1 : 0;
        $vegetarian = isset($request->vegetarian) ? 1 : 0;
        $available = isset($request->available) ? 1 : 0;
        $frozen = isset($request->frozen) ? 1 : 0;

        $newDish->gluten_free = $gluten_free;
        $newDish->vegan = $vegan;
        $newDish->vegetarian = $vegetarian;
        $newDish->frozen = $frozen;
        $newDish->available = $available;

        //? Non sono sicuro sia il modo migliore di controllare se è presente un'immagine
        if ($request->has('picture')) {
            $img_path = Storage::put('uploads', $data['picture']);
            $newDish->picture = $img_path;
        }

        $newDish->save();
        return redirect()->route('dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate(
            [
                'name' => 'required|min:2|max:50',
                'description' => 'required|max:255',
                'entry' => 'required|max:50',
                'picture' => 'nullable|mimes:jpeg,png',
                'price' => 'required|numeric',
            ],
            [
                'required' => 'Questo campo è obbligatorio',
                'image.mimes' => 'Il file dev\'essere in formato .jpg o .png'
            ]
        );

        $data = $request->all();

        $dish->fill($data);

        $gluten_free = isset($request->gluten_free) ? 1 : 0;
        $vegan = isset($request->vegan) ? 1 : 0;
        $vegetarian = isset($request->vegetarian) ? 1 : 0;
        $available = isset($request->available) ? 1 : 0;
        $frozen = isset($request->frozen) ? 1 : 0;

        $dish->gluten_free = $gluten_free;
        $dish->vegan = $vegan;
        $dish->vegetarian = $vegetarian;
        $dish->frozen = $frozen;
        $dish->available = $available;

        if ($request->has('picture')) {
            $img_path = Storage::put('uploads', $data['picture']);
            $dish->picture = $img_path;
        }

        $dish->save();
        return redirect()->route('dishes.show', $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $target = Dish::find($dish->id);
        $target->delete();
        return redirect()->route('dishes.index')->with('deleted', $dish->name);
    }
}
