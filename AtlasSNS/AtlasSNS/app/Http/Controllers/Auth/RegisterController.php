<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)//$dataで送られてきたデータを並べる
    {
        return User::create([//（User＝ユーザーテーブル)にユーザー情報の新規作成
            'username' => $data['username'],//以下データの入れ込み指示
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){//もしpost通信でリクエスト(この場合データ入力)が来たときに
            $data = $request->input();//そのデータの塊を$dataと仮称します
        
            $this->validator($data);//バリデーションに飛ぶ
              if($validator->fails()){
                return redirect('/')
                            ->withInput()
                            ->withErrors($validator);
                //エラーだった時エラー文を出す
             }
                //エラーがない時は下の処理が動く
            $this->create($data);//上記の処理がなされて、$dataが作成された時それを$this->create(このページ内にあるcreateメソッド64-71)に取り出す

            $request->session()->put('username', $request->input('username'));

            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }

    
}
