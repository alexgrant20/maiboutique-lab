@extends('layouts.master')
@section('title', 'Maiboutique')

@section('content')

   <div class="d-flex flex-column align-items-center mb-3">
      <div class="mt-5">
         <h1 class="display-5">My Cart</h1>
      </div>

      <div class="d-flex justify-content-end p-5 gap-3" style="margin-left: 700px">
         <h3>Total Price: {{ number_format($totalPrice, 0, ',', '.') }}</h3>
         <form action="{{ route('transaction.store') }}" method="POST" class="ms-1">
            @csrf
            <button class="btn btn-primary">Check Out({{ $quantity }})</button>
         </form>
      </div>

      <div class="row mt-3 g-3" style="margin-top: 500px">
         @foreach ($cart->cartDetail as $crt)
            <div class="col-md-3">
               <div class="card shadow">
                  <div class="w-100" style="height: 300px">
                     <img src="{{ asset($crt->product->image) }}" class="w-100 h-100" style="background-size: 100% 100%"
                        alt="">
                  </div>
                  <div class="card-body d-flex flex-column">
                     <h5 class="card-title">{{ $crt->product->name }}</h5>
                     <h6 class="card-text"> Rp {{ number_format($crt->product->price, 0, ',', '.') }}</h6>
                     <h6 class="card-text mb-3"> Qty: {{ $crt->quantity }} </h6>
                     <a href="{{ route('cart.edit', ['cartDetail' => $crt]) }}" class="btn btn-primary">Edit Cart</a>
                     <form class="d-grid" action="{{ route('cart.delete', $crt->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger mt-1">Remove from Cart</button>
                     </form>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
      {{-- <div class="p-1" style="margin: 2rem">
            {{$products->links()}}
        </div> --}}
   </div>
@endsection
