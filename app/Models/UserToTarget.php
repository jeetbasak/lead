<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Target;
class UserToTarget extends Model
{
    //
    protected $table = 'user_to_target';
    protected $guarded = [];

    public function targett(){
       return $this->hasOne(Target::class, 'id', 'target_id');
    }
}
