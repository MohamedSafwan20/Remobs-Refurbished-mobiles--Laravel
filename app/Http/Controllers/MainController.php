<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Home()
    {
        $newArrivalProducts = Product::orderBy('created_at', 'desc')->get();

        return view('home')->with('newArrivals', $newArrivalProducts);
    }
}
