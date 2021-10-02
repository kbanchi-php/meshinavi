<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        // $restaurants = Restaurant::all();
        // $restaurants = Restaurant::paginate(10);
        $restaurants = Restaurant::simplePaginate(10);
        return view('restaurants.index', compact('restaurants'));
    }

    public function show(Restaurant $restaurant)
    {
        $zoom = 15;
        return view('restaurants.show', compact('restaurant', 'zoom'));
    }
}
