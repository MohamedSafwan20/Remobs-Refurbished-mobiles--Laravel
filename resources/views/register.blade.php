@extends('layouts.root')

@section('content')
    <div class="container">
        <form style="width: 55%; margin: 6% auto;" action={{ route('register') }} method="post">
            @csrf
            <div class="row my-3">
                <label for="full_name" class="col-md-2 col-form-label">Full Name</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="full_name">
                </div>
              </div>
            <div class="row my-3">
                <label for="email" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                  <input type="email" class="form-control" name="email">
                </div>
              </div>
            <div class="row my-3">
                <label for="password" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
            <div class="row my-3">
                <label for="password_confirmation" class="col-md-2 col-form-label">Confirm Password</label>
                <div class="col-md-10">
                  <input type="password" class="form-control my-3" name="password_confirmation">
                </div>
              </div>
                  <button type="submit" class="btn btn-primary">Sign in</button>
        </form>   
    </div>
@endsection