<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'image' => 'required|image|mimes:png,jpg,jpeg',
         'name' => 'required|unique:products,name|between:5,20',
         'description' => 'required|min:5',
         'price' => 'required|integer|gte:1000',
         'stock' => 'required|integer|gte:1',
      ];
   }
}
