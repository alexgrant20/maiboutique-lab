@extends('layouts.master')
@section('title', 'Products Detail')

@section('content')

   @if (Auth::user()->role_id == 2)
      <div class="d-flex justify-content-center align-items-center p-4 m-5" style="height: 68.7vh">
         <div class="card shadow mb-3" style="max-width: 900px;">
            <div class="row g-0">
               <div class="col-md-3">
                  <img src="{{ $product->image }}" class="w-100 h-100 rounded-start" style="background-size: 100% 100%"
                     alt="...">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h2 class="card-title">{{ $product->name }}</h2>
                     <h3 class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }} </h3>
                     <h4 class="card-text">Product Detail:</h4>
                     <p class="card-text">{{ $product->description }} </p>
                     <h4 class="card-text">Quantity:</h4>
                     <form action="{{ route('cart.store') }}" method="POST" class="d-flex" role="qty">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <input class="form-control form-control-sm text-center me-1" type="qty" name="quantity"
                           value="1" aria-label="Quantity">
                        <button class="btn btn-success" type="submit">Add To Cart</button>
                     </form>
                     <a href="{{ route('index') }}" class="btn btn-danger mt-1">Go Back</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @else
      {{-- admin --}}
      <div class="d-flex justify-content-center align-items-center p-4 m-5" style="height: 71.8vh">
         <div class="card shadow mb-3" style="max-width: 900px;">
            <div class="row g-0">
               <div class="col-md-4">
                  <img src="{{ $product->image }}" class="img-fluid rounded-start" alt="...">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h2 class="card-title">{{ $product->name }}</h2>
                     <h3 class="card-text">Rp. {{ $product->price }} </h3>
                     <h4 class="card-text">Product Detail:</h4>
                     <p class="card-text">{{ $product->description }} </p>
                     <a href="{{ route('index') }}" class="btn btn-danger mt-1">Go Back</a>
                     <form action={{ route('product.destroy', ['product' => $product]) }} method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger mt-1">Delete Item</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @endif

@endsection
