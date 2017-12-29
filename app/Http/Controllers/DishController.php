<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.dishes.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
//        $this->authorize('create', Dish::class);

        $path = $request->file('photo')->store('public/image');


        $dish = new Dish();
        $dish->title=$request->title;
        $dish->description=$request->description;
        $dish->price=$request->price;
        $dish->photo= basename($path);
        $dish->menu_id = $request->menu_id;

        $dish->save();

        return redirect()->route('dish.index')->with(['message' => 'Dish added successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $menus = Menu::all();
        return view('admin.dishes.edit', compact('dish', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDishRequest $request, Dish $dish)
    {
//        $this->authorize('update', Companie::class);

        $path = $request->file('photo')->store('public/image');

        $dish = Dish::findOrFail($dish->id);

        $path_old = '/public/image/';
        if(!empty($dish->photo)){
            Storage::delete($path_old.$dish->photo);
        }


        $dish->title=$request->title;
        $dish->description=$request->description;
        $dish->photo= basename($path);
        $dish->price = $request->price;
        $dish->menu_id = $request->menu_id;
        $dish->update();
        return redirect()->route('dish.index')->with(['message' => 'Dish updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $path = 'public/image/';
        Storage::delete($path.$dish->photo);
        $dish->delete();
        return redirect()->route('dish.index')->with(['message' => 'Dish deleted successfully']);
    }
}
