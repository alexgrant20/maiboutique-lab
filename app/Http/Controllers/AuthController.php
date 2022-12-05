<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use stdClass;

class AuthController extends Controller
{
  public function signup()
  {
    return view('auth.register');
  }

  public function register(RegisterUser $request)
  {
    try {
      $memberRole = Role::where('name', 'member')->firstOrFail(['id']);
    } catch (Exception $e) {
      abort(500);
    }

    DB::beginTransaction();

    try {
      $user = User::create(
        [
          'username' => $request->username,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'phone_number' => $request->phone_number,
          'address' => $request->address,
          'role_id' => $memberRole->id,
        ]
      );

      Cart::create([
        'user_id' => $user->id
      ]);
    } catch (Exception $e) {
      DB::rollBack();
      abort(500);
    }

    DB::commit();

    // redirect to login
    return redirect()->route('auth.signin');
  }

  public function signin(Request $request)
  {
    $auth = json_decode($request->cookie('auth')) ?? null;

    return view('auth.login', [
      'auth' => $auth
    ]);
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:5|max:20',
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      if ($request->remember_me) {
        $minutes = 60 * 12 * 7; // 7 days
        Cookie::queue('auth', json_encode(['email' => $request->email, 'password' => $request->password]), $minutes);
      }

      return redirect()->intended(route('index'));
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function logout(Request $request)
  {
    $request->session()->invalidate();

    $request->session()->regenerateToken();

    Auth::logout();

    return redirect()->route('auth.login');
  }
}