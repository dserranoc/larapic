<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //RELACION MUCHOS A UNO (N:1) Users
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    //RELACION MUCHOS A UNO (N:1) Images
    public function image(){
        return $this->belongsTo('App\Image', 'user_id');
    }
}
