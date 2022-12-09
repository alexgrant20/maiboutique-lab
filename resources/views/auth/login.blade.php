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
                  <input type="email" class="form-control" id="email" name="email"
                     value="{{ old('email', @$auth->email) }}">
               </div>
               <div class="mb-3">
                  <label for="passowrd" class="form-label">Password</label>
                  <input type="password" class="form-control" id="passowrd" name="password" placeholder="5-20 characters"
                     value="{{ @$auth->password }}">
               </div>
               <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                  <label class="form-check-label" for="remember_me">Remember Me</label>
               </div>
               <div class="d-grid">
                  <button type="submit" class="btn btn-primary mt-2">Sign In</button>
               </div>
            </form>

            <div class="text-center">
               Dont have account? <a class="text-center" href="{{ route('auth.signup') }}">Sign Up</a>
            </div>
         </div>
      </div>
   </div>
@endsection
