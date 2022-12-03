<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;

   public $guarded = ['id'];

   public function scopeFilterName($query, $filter)
   {
      $query->when(@$filter, function ($query, $name) {
         $query->where('name', 'LIKE', '%' . $name . '%');
      });
   }
}
