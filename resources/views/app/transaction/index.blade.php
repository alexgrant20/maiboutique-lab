@extends('layouts.master')
@section('title', 'Maiboutique')

@section('content')

    <div class="d-flex flex-column align-items-center">
        <div class="mt-5">
            <h1 class="display-5">Check What You've Bought!</h1>
        </div>
        <div class="d-flex flex-wrap justify-content-center mt-3 mb-4 gap-4" style="margin-top: 500px">

            @foreach ($transaction as $trx)
                    <div class="d-flex flex-column card shadow bg-secondary text-white" style="width: 40rem">
                        <div class="card-body flex-grow-1">
                        <h5 class="card-title">{{$trx->created_at}}</h5>
                        <ul>
                            @foreach ($trx->transactionDetail as $trxdetail)
                                <li class="ms-1">
                                <div class="row">
                                    <p class="card-title col-md-5">{{$trxdetail->quantity}} pc(s) {{$trxdetail->product->name}}</p>
                                    <span class="col-md-7">Rp {{number_format($trxdetail->price,0,',','.')}}</span>
                                </div>
                                </li>
                            @endforeach
                        </ul>
                        <h5 class="card-text">Total Price {{number_format($trx->total_price,0,',','.')}} </h5>
                        {{-- <a href="{{ route('detail', ['id'=>$product->id]) }}" class="btn btn-primary">More Detail</a> --}}
                        </div>
                    </div>
            @endforeach
        </div>
        {{-- <div class="p-1" style="margin: 2rem">
            {{$products->links()}}
        </div> --}}
    </div>
@endsection

