<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Salary extends Model
{
     protected $table = 'salary';
     protected $guarded = [];

     public function userr(){
       return $this->hasOne(User::class, 'id', 'user_id');
    }

}
