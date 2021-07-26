<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class State extends Model
{
    protected $table = 'states';
     protected $guarded = [];

      public function user(){
       return $this->hasOne(User::class, 'state_id', 'id');
    }
}
