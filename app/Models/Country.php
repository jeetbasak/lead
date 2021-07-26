<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Country extends Model
{
    protected $table = 'countries';
     protected $guarded = [];

      public function user(){
       return $this->hasOne(User::class, 'country_id', 'id');
    }
}
