<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;//13行目の$posts=Post::get();のPostを定義

class PostsController extends Controller
{
    //
    public function index(){
        //全ての投稿を取得
        $posts = Post::get();//Postテーブルが情報をgetした時値を$postとして入手する

        return view('posts.index');
    }
    public function store(Request $request){

        //バリデーション
        //$varidator = Varidatator::make($request->all(),[
            //'post_title' => 'request|max:255'
            //'post_content => 'required|max:255'
        //]);

        //バリデーションエラー
        //if ($varidator->fails()){
            //return redirect('/') 
            //       ->withInput
            //       ->withErrors($varidator);
        //}

        //以下に登録処理を記述　(Eloquentモデル)
            $posts = new Post;
            $posts->post_content = $request->post_content;
            $posts->post_id = Auth::id();//ここでログインしているユーザーidを登録
            $posts->save();

            return redirect('/top');

    }
}
