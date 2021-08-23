@extends('layouts.root')

@section('content')
<div class="container">
  <form style="width: 55%; margin: 6% auto;" action={{ route('register') }} method="post">
    @csrf
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
      <label for="password" class="col-md-2 col-form-label">Password</label>
      <div class="col-md-10">
        <input type="password" class="form-control @error('password') border border-danger @enderror" name="password">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="row my-3">
      <label for="password_confirmation" class="col-md-2 col-form-label">Confirm Password</label>
      <div class="col-md-10">
        <input type="password" class="form-control mt-2 @error('password_confirmation') border border-danger @enderror" name="password_confirmation">
        @error('password_confirmation')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
</div>
@endsection