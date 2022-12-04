@extends('layouts.master')
@section('title', 'Maiboutique')

@section('content')

{{-- {{dd($profile)}} --}}
<div class="m-5 p-5">
<div class="card text-center" style="width: 50rem;">
    <div class="card-body">
      <h1 class="card-title">My Profile</h1>
      <h4><span class="badge text-bg-warning">{{$profile->role->name}}</span></h4>
      <h4 class="card-title">Username : {{$profile->username}} </h4>
      <h4 class="card-title">Email : {{$profile->email}} </h4>
      <h4 class="card-title">Address : {{$profile->address}} </h4>
      <h4 class="card-title">Phone : {{$profile->phone_number}} </h4>
      @if (Auth::user()->role_id == 1)
        {{-- <form action={{route('profile.edit', ['user'=>$profile])}} method="POST">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-danger mt-1">Edit Profile</button>
        </form> --}}
        <a href=" {{route('profile.edit', $profile->id)}} " class="btn btn-primary">Edit Profile</a>
      @endif
        <a href="{{ route('password.edit') }}" class="btn btn-primary mt-2">Edit Password</a>
    </div>
  </div>
</div>
@endsection
