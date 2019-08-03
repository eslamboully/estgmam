<?php

namespace Modules\Comment\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Trip\Entities\Trip;
use Modules\TripModule\Entities\TripProgram;
use Modules\User\Entities\User;

class Comment extends Model
{
    protected $fillable = ['comment','user_id','trip_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

}
