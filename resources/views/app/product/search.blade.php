@extends('layouts.master')
@section('title', 'Search')

@section('content')
   <div class="d-flex flex-column align-items-center">
      <div class="mt-5">
         <h1 class="display-5">Search Your Favorite Clothes!</h1>
      </div>

      <form action="{{ route('index.search') }}" class="d-flex mt-3 mb-5" style="width: 700px" role="search">
         <input class="form-control-lg form-control me-2" type="search" name="name" placeholder="Search"
            aria-label="Search">
         <button class="btn btn-primary" type="submit">Search</button>
      </form>

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
