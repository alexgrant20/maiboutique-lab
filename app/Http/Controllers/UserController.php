<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('role:member', ['only' => ['edit', 'update']]);
  }

  public function show()
  {
    $user = auth()->user();

    $profile = User::find($user->id);

    return view('app.user.show', compact('profile'));
  }

  public function editPassword()
  {
    return view('app.user.edit-password');
  }

  public function updatePassword(ChangePasswordRequest $request)
  {
    $userPassword = auth()->user()->password;

    if (!Hash::check($request->old_password, $userPassword))
      return back()->withErrors([
        'old_password' => 'Old password dont match!',
      ]);

    User::find(Auth::id())->update([
      'password' => Hash::make($request->new_password)
    ]);

    return redirect()->route('profile');
  }

  public function edit()
  {
    $user = auth()->user();

    return view('app.user.edit', compact('user'));
  }

  public function update(UpdateUserRequest $request)
  {
    $user = User::find(auth()->user()->id);

    $userUpdateData = $request->safe()->toArray();

    $user->update($userUpdateData);

    return redirect()->route('profile');
  }
}