<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  use HasFactory, Uuids;

  protected $fillable = [
    'street',
    'number',
    'district',
    'city',
    'state',
    'postal_code', 
    'country',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
