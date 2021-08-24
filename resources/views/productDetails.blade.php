@extends('layouts.root')

@section('content')
<div class="container">
  <div style="width: 90%; margin: 16vh auto 0 auto;">
    <div class="d-flex flex-row">
      <div class="mx-2 p-2" style="min-width: 48%">
        <img style="max-height: 78vh; max-width: 38vw" src={{ asset('storage/product-images/'. $product->image)}} alt="Product-image">
      </div>
      <div class="mx-2 p-2" style="min-width: 48%">
        <h1>Product Details</h1>
        <h3>{{ $product->name }}</h3>
        <h5>₹{{ $product->price }}</h5>
        <p>{{ $product->description }}</p>
        <div class="d-flex">
          <button class="btn btn-primary btn-lg mx-1" style="width: 98%">ADD TO CART</button>
          <button class="btn btn-secondary btn-lg mx-1" style="width: 98%">BUY NOW</button>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection