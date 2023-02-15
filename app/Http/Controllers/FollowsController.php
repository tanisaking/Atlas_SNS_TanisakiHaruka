<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $follow_count = $follow->getFollowCount($user->id);
        return view('follows.followList');
    }
    public function followerList(){
        $login_user = auth()->user();
        $is_followed = $login_user->isFollowed($user->id);
        $follower_count = $follow->getFollowerCount($user->id);
        return view('follows.followerList');
    }

     //
    public function follow(User $user){
        $follow = FollowUser::create([
            'following_user_id' => \Auth::user()->id,
            'followed_user_id' => $user->id,
        ]);
        $followCount = count(FollowUser::where('followed_user_id',$user->id)->get());


        $follower = auth()->user();
        //dd($user);
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following){
            //フォローしていなければフォローする
            $follower->follow($user->id);
        }
        return back();
    }
    //フォロー解除
    public function unfollow(User $user){
        $follow = FollowUser::where('following_user_id',\Auth::user()->id)->where('followed_user_id',$user->id)->first();
        $follow->delete();
        $followCount = count(FollowUser::where('followed_user_id',$user->id)->get());

        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following){
            //フォローしていればフォロー解除する
            $follower->unfollow($user->id);
        }
        return back();
    }
}
