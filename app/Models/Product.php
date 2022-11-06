<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;

   public $guarded = ['id'];

   public function scopeFilterName($query, array $filter)
   {
      $query->when($filter['name'] ?? false, function ($query, $name) {
         $query->where('name', 'LIKE', '%' . $name . '%');
      });
   }
}
