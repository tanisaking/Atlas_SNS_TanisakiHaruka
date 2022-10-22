@extends('layouts.logout')

@section('content')

<div id="clear">
  if ( Session::has('username'))
  <p>{{ Session::get('username') }}さん</p>
  endif
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection