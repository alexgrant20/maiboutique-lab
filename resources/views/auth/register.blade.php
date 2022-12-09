@extends('layouts.auth')
@section('title', 'Sign Up')

@section('content')
   <div class="row w-100">
      <div class="col-12 col-xl-6 m-auto">
         <div class="shadow-sm border rounded p-5">
            <h1 class="fw-bold mb-4">Sign Up</h1>
            <form action="{{ route('auth.register') }}" method="POST" class="mb-3">
               @csrf
               <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" placeholder="(5-20 letters)" id="username" name="username" value="{{ old('username') }}">
               </div>
               <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
               </div>
               <div class="mb-3">
                  <label for="passowrd" class="form-label">Password</label>
                  <input type="password" class="form-control" placeholder="(5-20 letters)" id="passowrd" name="password" value="{{ old('password') }}">
               </div>
               <div class="mb-3">
                  <label for="phone_number" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" placeholder="(10-13 numbers)" id="phone_number" name="phone_number"
                     value="{{ old('phone_number') }}">
               </div>
               <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="(min 5 letters)" name="address" value="{{ old('address') }}">
               </div>
               <div class="d-grid">
                  <button type="submit" class="btn btn-primary mt-2">Submit</button>
               </div>
            </form>

            <div class="text-center">
               Already have account? <a class="text-center" href="{{ route('auth.signin') }}">Sign In</a>
            </div>
         </div>
      </div>
   </div>
@endsection
