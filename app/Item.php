<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Item extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
        //return $this->hasMany(Comment::class);
    }
}