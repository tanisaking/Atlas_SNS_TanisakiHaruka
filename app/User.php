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
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //postテーブルとのリレーション（主にテーブル側）
    public function posts(){//1対多の「多」側なので複数形
        return $this->hasMany('App\Post');
    }
    //followテーブルとのリレーション
    //フォロワー→フォロー
    public function followUsers(){
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }
    //フォロー→フォロワー
    public function follows(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }

    //フォローする
    public function follow($user_id){
        return $this->follows()->attach($user_id);
    }
    //フォロー解除する
    public function unfollow($user_id){
        return $this->follows()->detach($user_id);
    }
    //フォローしているか
    public function isFollowing($user_id){
        return (boolean) $this->follows()->where('followed_id','=',$user_id)->first();
    }
    //フォローされているか
    public function isFollowed($user_id){
        return (boolean) $this->followers()->where('following_id','=',$user_id)->first();
    }
}
