@extends('layouts.root')

@section('content')
<div class="container">   
  <form style="width: 55%; margin: 6% auto;" action={{ route('login') }} method="post">
    @csrf
    @if (session('error'))
    <div class="bg-danger text-center h-2 py-3">
        <span class="text-white">{{ session('error')}}</span>
    </div>
    @endif
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
    <button type="submit" class="btn btn-primary">Log in</button>
  </form>
</div>
@endsection