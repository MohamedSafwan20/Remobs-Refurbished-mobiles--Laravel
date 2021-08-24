@extends('layouts.root')

@section('content')
<div class="container">
  <div style="width: 90%; margin: 16vh auto 0 auto;">

    <div>
    <h1>New Arrivals</h1>
    <div style="width: 95%; margin: 2% auto;">
      <div class="d-flex flex-row flex-nowrap overflow-auto cards-container bg-light">
        @foreach ($newArrivals as $product)
        <div class="card card-block m-2 shadow-sm" style="min-width: 16rem; max-width: 16rem; min-height: 22rem; max-height: 22rem;">
          <img
          style="max-height: 50%"
            src={{ asset('storage/product-images/'.$product->image) }}
            class="card-img-top" alt="mobile-img">
          <div class="card-body">
            <h5>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="#02b030" class="bi bi-star-fill"
                viewBox="0 0 16 16" style="vertical-align: text-center">
                <path
                  d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <span style="font-size: 16px">{{ $product->rating }}/5</span>
            </h5>
            <a class="card-title fs-5 text-decoration-none" href={{ route('productDetails', ['productId' => $product]) }}>{{ $product->name }}</a>
            @if (strlen($product->description) > 100)
            <p class="card-text">{{ substr($product->description, 0, 100) }}...</p>
            @else
            <p class="card-text">{{$product->description}}</p>
            @endif
          </div>
          <h6 class="p-3 pt-0">Price:
            <span class="text-secondary">
              ₹{{ $product->price }}
            </span>
          </h6>
        </div>
        @endforeach
      </div>
    </div>
  </div>

    <div style="margin: 10vh auto">
    <h1>Lowest In Price</h1>
    <div style="width: 95%; margin: 2% auto;">
      <div class="d-flex flex-row flex-nowrap overflow-auto cards-container bg-light">
        @foreach ($lowestPrice as $product)
        <div class="card card-block m-2 shadow-sm" style="min-width: 16rem; max-width: 16rem; min-height: 22rem; max-height: 22rem;">
          <img
          style="max-height: 50%"
          src={{ asset('storage/product-images/'.$product->image) }}
            class="card-img-top" alt="mobile-img">
          <div class="card-body">
            <h5>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="#02b030" class="bi bi-star-fill"
                viewBox="0 0 16 16" style="vertical-align: text-center">
                <path
                  d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <span style="font-size: 16px;">{{ $product->rating }}/5</span>
            </h5>
            <a class="card-title fs-5 text-decoration-none" href={{ route('productDetails', ['productId' => $product]) }}>{{ $product->name }}</a>
            @if (strlen($product->description) > 100)
            <p class="card-text">{{ substr($product->description, 0, 100) }}...</p>
            @else
            <p class="card-text">{{$product->description}}</p>
            @endif
          </div>
          <h6 class="p-3 pt-0">Price:
            <span class="text-secondary">
              ₹{{ $product->price }}
            </span>
          </h6>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  </div>
  @endsection