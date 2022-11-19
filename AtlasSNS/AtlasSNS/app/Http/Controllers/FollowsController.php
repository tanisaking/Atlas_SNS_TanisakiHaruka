<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    //
    public function show(Request $request,$id){
        $user = User::find($id);
        $user_flg = $request->path();
        $user_flg = preg_replace('/[^0-10000]/','',$user_flg);
        return view('users.search',[
            'uesr'=>$user,'user_flg'=>$user_flg
        ]);
    }
    public function follow(User $user){
        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(is_following){
            //フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }
    //フォロー解除
    public function unfollow(User $user){
        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following){
            //フォローしていればフォロー解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
}
