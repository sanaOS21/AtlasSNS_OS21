<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use phpDocumentor\Reflection\Types\Boolean;

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
    // ユーザがフォローしている人を取得
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id')->withTimestamps();
    }


    //ユーザをフォローされている人を取得
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id')->withTimestamps();
    }

    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->first(['follows.id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (bool) $this->followers()->where('following_id', $user_id)->first(['follows.id']);
    }

    //
    // public function getFollowCount($user_id)
    // {
    //     return $this->where('following_id', $user_id)->count();
    // }

    // public function getFollowerCount($user_id)
    // {
    //     return $this->where('followed_id', $user_id)->count();
    // }
}
