<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $users = User::all();
        return view('users.search',[
            'users' => $users
        ]);
    }
    //検索機能
    public function index(Request $request){

        $search = $request->input('search');

        $query = User::query();

        //もし検索フォームにキーワードが入力されたら
        if (!empty($search)){
            $query->where('username','like',"{$search}");
            }

            $users = $query->get();
        //ビューにuserとsearchを変数として渡す
        return view('users.search',[
                'users' => $users,
                'search' => $search,
        ]);
    }
}
