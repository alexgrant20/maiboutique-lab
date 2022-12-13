@extends('layouts.master')
@section('title', 'Maiboutique')

@section('content')

   <div class="d-flex justify-content-center align-items-center p-4 m-5" style="height: 68.7vh">
      <div class="card mb-3" style="max-width: 900px;">
         <div class="row g-0">
            <div class="col-md-4">
               <img src="{{ $cartDetail->product->image }}" class="w-100 h-100" style="background-size: 100% 100%"
                  alt="">
            </div>
            <div class="col-md-8">
               <div class="card-body">
                  <h2 class="card-title">{{ $cartDetail->product->name }}</h2>
                  <h3 class="card-text">Rp. {{ $cartDetail->product->price }} </h3>
                  <h4 class="card-text">Product Detail:</h4>
                  <p class="card-text">{{ $cartDetail->product->description }} </p>
                  <h4 class="card-text">Quantity:</h4>
                  <form action="{{ route('cart.update', ['cartDetail' => $cartDetail]) }}" method="POST" class="d-flex"
                     role="qty">
                     @csrf
                     @method('patch')
                     {{-- <input type="hidden" name="product_id" value="{{$product->id}}"/> --}}
                     <input class="form-control form-control-sm text-center me-1" type="qty" name="quantity"
                        value="{{ $cartDetail->quantity }}" aria-label="Quantity">
                     <button class="btn btn-success" type="submit">Update Cart</button>
                  </form>
                  <a href="{{ route('cart.index') }}" class="btn btn-danger mt-1">Go Back</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>



@endsection
