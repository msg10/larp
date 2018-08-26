<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Comment extends Model
{
    protected $fillable = ['body'];
    public function item(){
        return $this->belongsTo('Item');
        //return $this->belongsTo(Item::class);
    }

//use \OwenIt\Auditing\Auditable;
    //public function user(){
        //return $this->belongsTo('App\User');
    //}
}
