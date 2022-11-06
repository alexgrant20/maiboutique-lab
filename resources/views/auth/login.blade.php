@extends('layouts.auth')
@section('title', 'Login')

@section('content')
   <div class="row w-100">
      <div class="col-12 col-xl-6 m-auto">
         <div class="shadow-sm border rounded p-5">
            <h1 class="fw-bold mb-4">Sign In</h1>
            <form action="{{ route('auth.login') }}" method="POST" class="mb-3">
               @csrf
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
               </div>
               <div class="mb-3">
                  <label for="passowrd" class="form-label">Passowrd</label>
                  <input type="password" class="form-control" id="passowrd" name="password" value="">
               </div>
               <div class="d-grid">
                  <button type="submit" class="btn btn-primary mt-2">Submit</button>
               </div>
            </form>

            <div class="text-center">
               Dont have account? <a class="text-center" href="{{ route('auth.signup') }}">Sign Up</a>
            </div>
         </div>
      </div>
   </div>
@endsection