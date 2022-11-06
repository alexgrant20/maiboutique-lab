<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'quantity' => 'required|gt:0',
         'product_id' => 'required|exists:products,id'
      ];
   }
}
