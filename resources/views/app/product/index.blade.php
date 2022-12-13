@extends('layouts.master')
@section('title', 'Maiboutique')

@section('content')
   <div class="d-flex flex-column align-items-center">
      <div class="my-5">
         <h1 class="display-5">Find Your Best Clothes Here!</h1>
      </div>

      <div class="container">
         <div class="row g-4">
            @foreach ($products as $product)
               <x-product-container :product="$product" />
            @endforeach
         </div>
      </div>

      <div class="p-1" style="margin: 2rem">
         {{ $products->links() }}
      </div>
   </div>
@endsection
