<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        // 'id',
        'user_id',
        'post',
    ];
    //usersテーブルとのリレーション
    //1対多側のため単数系
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function Follows()
    // {
    //     return $this->hasMany('App\Follow');
    // }
}
