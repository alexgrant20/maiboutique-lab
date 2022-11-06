<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Catch_;

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

   public function signin()
   {
      return view('auth.login');
   }

   public function login(Request $request)
   {
      $credentials = $request->validate([
         'email' => 'required|email',
         'password' => 'required|min:5|max:20',
      ]);

      if (Auth::attempt($credentials)) {
         $request->session()->regenerate();

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
