<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;//13行目の$posts=Post::get();のPostを定義
<<<<<<< HEAD
use App\User;
use Auth;
use Validator;
=======
>>>>>>> ee2381c654956ba3fbc9be166ea98cb6028ca2a9

class PostsController extends Controller
{
    //
<<<<<<< HEAD
    public function index()
    {
        //全ての投稿を取得
        $posts = Post::get();//Postテーブルが情報をgetした時値を$postとして入手する

        return view('posts.index',[
            'posts' => $posts
        ]);
    }
    
=======
    public function index(){
        //全ての投稿を取得
        $posts = Post::get();//Postテーブルが情報をgetした時値を$postとして入手する

        return view('posts.index');
    }
>>>>>>> ee2381c654956ba3fbc9be166ea98cb6028ca2a9
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
<<<<<<< HEAD
            $posts = new Post;//新しい投稿を$postとし
            $posts->post = $request->post;//index.blade.phpにてpostと名前のついた値を$requesutで引き出してpostテーブルに登録
            $posts->user_id = Auth::id();//ここでログインしているユーザーidを登録
=======
            $posts = new Post;
            $posts->post_content = $request->post_content;
            $posts->post_id = Auth::id();//ここでログインしているユーザーidを登録
>>>>>>> ee2381c654956ba3fbc9be166ea98cb6028ca2a9
            $posts->save();

            return redirect('/top');

    }
}
