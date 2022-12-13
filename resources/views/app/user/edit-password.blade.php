@extends('layouts.master')
@section('title', 'Change-Password')

@section('content')

   <div class="d-flex flex-column align-items-center justify-content-center" style="height: 82vh">
      <div class="card justify-content-center m-4 p-3" style="width: 500px">

         <h2 class="text-center">Update Password</h2>

         <form action={{ route('password.update') }} method="POST" class="">
            @csrf
            <div class="mt-3">
               <label for="inputPassword5" class="form-label">Old Password</label>
               <input type="password" placeholder="(5 - 20 letters)" name="old_password" class="form-control">
            </div>
            <div class="mt-3">
               <label for="password" class="form-label">New Password</label>
               <input type="password" placeholder="(5 - 20 letters)" name="new_password" class="form-control">
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
