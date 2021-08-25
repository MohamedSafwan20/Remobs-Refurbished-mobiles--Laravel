@extends('layouts.root')

@section('content')
<div class="container" style="margin-top: 20vh">
  <h1 class="text-center">Enter Your Details</h1>
  <form style="width: 55%; margin: 3% auto;" action={{ route('makePayment', ['amount' => $amount, 'product' => $product]) }} method="post">
    @csrf
    @if (session('message'))
    <div class="bg-primary text-center h-2 py-2">
        <span class="text-white">{{ session('message')}}</span>
    </div>
    @endif
    @if (session('error'))
    <div class="bg-danger text-center h-2 py-2">
        <span class="text-white">{{ session('error')}}</span>
    </div>
    @endif
    <h6 class="text-secondary">Amount To be paid: {{ $amount }}</h6>
    <div class="row my-3">
      <label for="full_name" class="col-md-2 col-form-label">Full Name</label>
      <div class="col-md-10">
        <input type="text" class="form-control @error('full_name') border border-danger @enderror" name="full_name" value={{ old('full_name') }}>
        @error('full_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="row my-3">
      <label for="email" class="col-md-2 col-form-label">Email</label>
      <div class="col-md-10">
        <input type="email" class="form-control @error('email') border border-danger @enderror" name="email" value={{ old('email') }}>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="row my-3">
      <label for="mobile" class="col-md-2 col-form-label">Mobile Number</label>
      <div class="col-md-10">
        <input type="text" class="form-control @error('mobile') border border-danger @enderror" name="mobile">
        @error('mobile')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Next</button>
  </form>
</div>
@endsection