@extends('layouts.root')

@section('content')
<div class="container" style="margin-top: 20vh">
  <h1 class="text-center">Admin Panel</h1>
  <form style="width: 55%; margin: 3% auto;" action={{ route('adminPanel') }} method="post" enctype="multipart/form-data">
    @csrf
    @if (session('message'))
    <div class="bg-success text-center h-2 py-2">
        <span class="text-white">{{ session('message')}}</span>
    </div>
    @endif
    <div class="row my-3">
      <label for="product_name" class="col-md-2 col-form-label">Product Name</label>
      <div class="col-md-10">
        <input type="text" class="form-control mt-3 @error('product_name') border border-danger @enderror" name="product_name" value={{ old('product_name') }}>
        @error('product_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="row my-3">
      <label for="product_description" class="col-md-2 col-form-label">Product Description</label>
      <div class="col-md-10">
        <textarea class="form-control @error('product_description') border border-danger @enderror" name="product_description" value={{ old('product_description') }} rows="5"></textarea>
        @error('product_description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="row my-3">
      <label for="product_price" class="col-md-2 col-form-label">Product Price</label>
      <div class="col-md-10">
        <input type="number" class="form-control mt-3 @error('product_price') border border-danger @enderror" name="product_price" placeholder="In INR">
        @error('product_price')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="row my-3">
      <label for="product_image" class="col-md-2 col-form-label">Product Image</label>
      <div class="col-md-10">
        <input type="file" class="form-control mt-3 @error('product_image') border border-danger @enderror" name="product_image">
        @error('product_image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
  </form>
</div>
@endsection