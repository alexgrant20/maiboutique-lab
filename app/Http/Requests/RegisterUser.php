<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'username' => 'required|between:5,20|unique:users,username',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|between:5,20',
         'phone_number' => 'required|between:10,13',
         'address' => 'required|min:5'
      ];
   }
}
