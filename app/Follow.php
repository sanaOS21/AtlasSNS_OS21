<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $fillable = [
        'id',
        'user_id',
        'post',
    ];
    public function post()
    {
        return $this->belongsToMany('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
