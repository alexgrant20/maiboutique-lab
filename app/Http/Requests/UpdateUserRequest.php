<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'username' => 'required|between:5,20|unique:users,username,' . auth()->user()->id,
         'email' => 'required|email|unique:users,email,' . auth()->user()->id,
         'phone_number' => 'required|between:10,13',
         'address' => 'required|min:5',
      ];
   }
}
