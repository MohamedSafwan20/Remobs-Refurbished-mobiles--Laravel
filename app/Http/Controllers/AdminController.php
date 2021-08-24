<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminPanelView()
    {
        if (auth()->user()->is_admin)
            return view('adminPanel');
        else
            return redirect()->route('home');
    }

    public function adminPanel(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'product_image' => 'required|image',
        ]);

        $request->product_image->store('product-images', 'public');

        Product::create([
            'name' => $request->product_name,
            'description' => $request->product_description,
            'price' => $request->product_price,
            'image' => $request->product_image->hashName(),
        ]);

        return back()->with('message', 'Product Successfully Added.');
    }
}
