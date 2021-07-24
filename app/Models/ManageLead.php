<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ManageLead extends Model
{
   
     protected $table = 'lead_management';
     protected $guarded = [];

    public function user(){
       return $this->hasOne(User::class, 'id', 'tagging_id');
    }
}
