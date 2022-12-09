@extends('layouts.master')
@section('title', 'Maiboutique')

@section('content')

    <div class="d-flex flex-column align-items-center mb-3">

        <div class="mt-5">
            <h1 class="display-5">My Cart</h1>
        </div>

        <div class="d-flex justify-content-end p-5 gap-3" style="margin-left: 700px">
            <h3>Total Price: {{number_format($totalPrice,0,',','.')}}</h3>
            <form action="{{ route('transaction.store') }}" method="POST" class="ms-1">
                @csrf
                <button class="btn btn-primary">Check Out({{$quantity}})</button>
            </form>
        </div>

        <div class="d-flex flex-wrap justify-content-center mt-3 gap-4" style="margin-top: 500px">
            @foreach ($cart->cartDetail as $crt)
                    <div class="d-flex flex-column card" style="width: 18rem">
                        <img src="{{asset($crt->product->image)}}" class="card-img-top" alt="...">
                        <div class="card-body flex-grow-1">
                        <h5 class="card-title">{{$crt->product->name}}</h5>
                        <h6 class="card-text"> Rp {{number_format($crt->product->price,0,',','.')}}</h6>
                        <h6 class="card-text"> Qty: {{$crt->quantity}} </h6>
                        <a href="{{ route('cart.edit', ['cartDetail'=>$crt]) }}" class="btn btn-primary">Edit Cart</a>
                        <form action="{{ route('cart.delete', $crt->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger mt-1">Remove from Cart</button>
                        </form>
                        </div>
                    </div>
            @endforeach
        </div>
        {{-- <div class="p-1" style="margin: 2rem">
            {{$products->links()}}
        </div> --}}
    </div>
@endsection

