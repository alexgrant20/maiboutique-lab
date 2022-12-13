@extends('layouts.master')
@section('title', 'Edit-Profile')

@section('content')

   <div class="d-flex align-items-center justify-content-center" style="height: 82vh">
      <div class="card text-center m-4 p-3" style="width: 500px">

         <h2>Update Profile</h2>

         <form action={{ route('profile.update', $user->id) }} method="POST" class="">
            @csrf
            @method('put')
            <div class="mt-3">
               <label for="username" class="form-label">Username</label>
               <input type="text" name="username" value="{{ $user->username }}" class="form-control">
            </div>

            <div class="mt-3">
               <label for="email" class="form-label">Email</label>
               <input type="text" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <div class="mt-3">
               <label for="phoneNumber" class="form-label">Phone Number</label>
               <input type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control">
            </div>

            <div class="mt-3">
               <label for="Address" class="form-label">Address</label>
               <input type="text" name="address" value="{{ $user->address }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-success mt-2" style="width: 450px">Save Update</button>

         </form>
         <div style="margin-right: 360px">
            <a href="{{ route('profile') }}"><button type="submit" class="btn btn-outline-danger mt-2"
                  style="width: 90px">Back</button></a>
         </div>
      </div>
   </div>

@endsection
