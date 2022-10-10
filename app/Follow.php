<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'post',
    ];
    // 多対多のリレーションを取るための中間テーブル設置
    protected $table = 'follow_users';

    public function post()
    {
        return $this->belongsToMany('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
