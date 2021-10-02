<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {

        // $restaurants = Restaurant::all();
        // $restaurants = Restaurant::paginate(10);
        // $restaurants = Restaurant::simplePaginate(10);

        // $name = $request->name;
        // $category = $request->category;

        // $query = Restaurant::query();
        // if (!empty($name)) {
        //     $query->where('name', 'like', '%' . $name . '%');
        // }
        // if (!empty($category)) {
        //     $query->where('category', 'like', '%' . $category . '%');
        // }
        // $restaurants = $query->paginate(10);

        $name = $request->name;
        $category = $request->category;

        $params = $request->query();
        $restaurants = Restaurant::search($params)->paginate(10);
        $restaurants->appends(compact('name', 'category'));

        // dd($restaurants);

        return view('restaurants.index', compact('restaurants', 'name', 'category'));
    }

    public function show(Restaurant $restaurant)
    {
        $zoom = 15;
        return view('restaurants.show', compact('restaurant', 'zoom'));
    }
}
