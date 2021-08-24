<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetailsView(Request $request)
    {
        $product = Product::where('name', $request->search)->orWhere('id', $request->productId)->get()->first();

        return view('productDetails')->with('product', $product);
    }

    public function productDetails(Request $request)
    {
        dd($request);
    }

    public function productDetailsSearch(Request $request)
    {
        dd($request->search);
    }
}
