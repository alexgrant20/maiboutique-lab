@extends('layouts.master')
@section('title', 'Maiboutique')

@section('content')
   <img src="{{ asset('img/bg-home.png') }}" alt=""
      style="height: 100vh; width: 100vw; position: absolute; top: 0; left:0; z-index: -1;">
   <div class="d-flex justify-content-center align-items-center position-absolute"
      style="left: 50%; top:50%; transform: translate(-50%, -50%)">
      <div class="card bg-dark text-center text-white" style="width: 30rem;">
         <div class="card-body">
            <h3>Welcome To MaiBoutique</h3>
            <h5>Online Boutique that Provides Everything for You</h5>
            <a href="{{ route('auth.register') }}"><button class="btn btn-primary mt-1" type="button">Sign Up
                  Now</button></a>
         </div>
      </div>
   </div>

@endsection
