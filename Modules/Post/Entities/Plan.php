<?php

namespace Modules\Post\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use Translatable;

    public $translatedAttributes = ['date','currency'];
    protected $fillable = ['money'];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
