<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;

class SimplePageController extends Controller
{
    public function dishIndex()
    {
        $dishes = Dish::all();
        return view('dishes.index', compact('dishes'));
    }
}
