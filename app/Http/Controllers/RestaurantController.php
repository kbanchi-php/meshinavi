<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        // $restaurants = Restaurant::search($params)->paginate(10);
        $restaurants = Restaurant::search($params)->paginate(5);
        $restaurants->appends(compact('name', 'category'));

        // dd($restaurants);

        return view('restaurants.index', compact('restaurants', 'name', 'category'));
    }

    public function show(Restaurant $restaurant)
    {
        $zoom = 15;
        return view('restaurants.show', compact('restaurant', 'zoom'));
    }

    public function create()
    {
        $restaurant = new Restaurant();
        $restaurant->latitude = 35.658584;;
        $restaurant->longitude = 139.7454316;
        $zoom = 15;
        $categories = Category::all();
        $data = [
            'restaurant' => $restaurant,
            'zoom' => $zoom,
            'categories' => $categories,
        ];
        return view('restaurants.create', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required', 'address' => 'required', 'opentime' => 'required',
        ]);

        $path = $request->file('image')->store('restaurant_image', 'admin');

        $restaurant = new Restaurant();

        $restaurant->name = $request->name;
        $restaurant->name_kana = $request->name_kana;
        $restaurant->address = $request->address;
        $restaurant->opentime = $request->opentime;
        $restaurant->holiday = $request->holiday;
        $restaurant->note = $request->note;
        $restaurant->pr_short = $request->pr_short;
        $restaurant->pr_long = $request->pr_long;
        $restaurant->img_path = $path;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;

        $restaurant->save();

        return redirect()->route('restaurants.index');
    }
}
