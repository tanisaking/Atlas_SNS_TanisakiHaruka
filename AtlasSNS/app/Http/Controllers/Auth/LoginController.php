<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');//middlweare(認証されているユーザーかどうかをどうかを確認してくれるメソッド)
        //('guest')はKernel.phpにて定義され、RedirectifAuthenticated.php内に記載されている
        //middlewareメソッドによって認証を受けたguestは再度login画面に行こうとしてもlogoutページに限定して表示される
        //一回loginしたguestに対して再度login画面を表示させない処理
    }

    public function login(Request $request){
        if($request->isMethod('post')){//もし'post'HTTP動詞でリクエストが来た場合

            $data=$request->only('mail','password');//'mail','password'に限定してリクエストしたものを$dataとする
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
                return redirect('/top');
            }
        }
        return view("auth.login");
    }

    public function logout(){

        Auth::logout();
        return redirect('login');
    }

}
