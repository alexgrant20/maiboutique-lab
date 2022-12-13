@extends('layouts.master')
@section('title', 'Maiboutique')

@section('content')
   <div class="m-5 p-5 d-flex align-items-center justify-content-center" style="height: 68.7vh">
      <div class="card text-center shadow-lg bg-black text-white" style="width: 50rem;">
         <div class="card-body">
            <h1 class="card-title">My Profile</h1>
            <h4><span class="badge text-bg-warning">{{ $profile->role->name }}</span></h4>
            <h4 class="card-title">Username : {{ $profile->username }} </h4>
            <h4 class="card-title">Email : {{ $profile->email }} </h4>
            <h4 class="card-title">Address : {{ $profile->address }} </h4>
            <h4 class="card-title">Phone : {{ $profile->phone_number }} </h4>
            @if (Auth::user()->role_id == 2)
               <a href=" {{ route('profile.edit') }} " class="btn btn-primary">Edit Profile</a>
            @endif
            <a href="{{ route('password.edit') }}" class="btn btn-danger">Edit Password</a>
         </div>
      </div>
   </div>
@endsection
