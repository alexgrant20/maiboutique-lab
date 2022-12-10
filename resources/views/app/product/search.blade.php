@extends('layouts.master')
@section('title', 'Search')

@section('content')
<div class="d-flex flex-column align-items-center">
    <div class="mt-5">
        <h1 class="display-5">Search Your Favorite Clothes!</h1>
    </div>

    <form action="{{ route('index.search') }}" class="d-flex mt-3" style="width: 700px" role="search">
        <input class="form-control me-2" type="search" name="name" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>

    <div class="d-flex flex-wrap justify-content-center mt-5 gap-4" style="margin-top: 500px">

        @foreach ($products as $product)
                <div class="d-flex flex-column card shadow" style="width: 18rem">
                    <img src="{{asset($product->image)}}" class="card-img-top" alt="...">
                    <div class="card-body flex-grow-1">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <h6 class="card-text"> Rp. {{$product->price}} </h6>
                    <a href="{{ route('detail', ['id'=>$product->id]) }}" class="btn btn-primary">More Detail</a>
                    </div>
                </div>
        @endforeach
    </div>
    <div class="p-1" style="margin: 2rem">
        {{$products->links()}}
    </div>
</div>

@endsection
