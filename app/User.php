<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'bio', 'images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //postsテーブルとのリレーション（主テーブル側）
    //1対多の「多」のため複数形
    // public function posts()
    // {
    //     return $this->hasMany('App\Post');
    // }

    // フォロワー→フォロー
    public function followUsers()
    {
        // 第一引数...使用するモデル
        // 第二引数...使用するテーブル名
        // 第三引数...リレーションを定義している外部のキー名
        // 第四引数...結合するモデルの外部キー名
        // followed_id...相手のユーザ、following_id...自分のユーザ
        return $this->belongsToMany('App\User', 'follow_users', 'followed_id', 'following_id');
    }
    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'following_id', 'followed_id');
    }
}
