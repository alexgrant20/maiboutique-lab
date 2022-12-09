@extends('layouts.master')
@section('title', 'Maiboutique')

@section('content')

    <div class="d-flex flex-column align-items-center">
        <div class="mt-5">
            <h1 class="display-5">Find Your Best Clothes Here!</h1>
        </div>
        <div class="d-flex flex-wrap justify-content-center mt-5 gap-4" style="margin-top: 500px">

            @foreach ($products as $product)
                    <div class="d-flex flex-column card" style="width: 18rem">
                        <img src="{{asset($product->image)}}" class="card-img-top" alt="...">
                        <div class="card-body flex-grow-1">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <h6 class="card-text"> Rp {{number_format($product->price,0,',','.')}} </h6>
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

