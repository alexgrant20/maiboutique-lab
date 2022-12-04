@extends('layouts.master')
@section('title', 'Products Detail')

@section('content')

@if (Auth::user()->role_id == 1)

    <div class="d-flex justify-content-center align-items-center p-4 m-5">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$product->image}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{$product->name}}</h2>
                    <h3 class="card-text">Rp. {{$product->price}} </h3>
                    <h4 class="card-text">Product Detail:</h4>
                    <p class="card-text">{{$product->description}} </p>
                    <h4 class="card-text">Quantity:</h4>
                    <form class="d-flex" role="qty">
                        <input class="form-control form-control-sm text-center me-1" type="qty" placeholder="1" aria-label="Quantity">
                        <a href=""><button class="btn btn-success" type="submit">Add To Cart</button></a>
                    </form>
                    <a href="{{route('index')}}" class="btn btn-danger mt-1">Go Back</a>
                </div>
            </div>
            </div>
        </div>
        </div>
@else
    {{-- admin --}}
    <div class="d-flex justify-content-center align-items-center p-4 m-5">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$product->image}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{$product->name}}</h2>
                    <h3 class="card-text">Rp. {{$product->price}} </h3>
                    <h4 class="card-text">Product Detail:</h4>
                    <p class="card-text">{{$product->description}} </p>
                    <a href="{{route('index')}}" class="btn btn-danger mt-1">Go Back</a>
                    <form action={{route('product.destroy', ['product'=>$product])}} method="POST">
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
