<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $guarded = ['id'];

  protected $hidden = ['password'];

  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  public function cart()
  {
    return $this->hasOne(Cart::class);
  }

  public function scopeHasRole($query, $role)
  {
    return !empty($query->where('id', auth()->user()->id)->whereRelation('role', 'name', $role)->first());
  }
}
