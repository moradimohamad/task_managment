<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class Task extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
