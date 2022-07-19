@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<!--バリデーションエラーの表示-->

<!--投稿フォーム-->
<form action = "{{ url('top') }}" method = "POST" class = "form-horizontal">
<!--投稿の本文-->
    <div>
        <img src="{{ asset('/images/icon1.png') }}">
        <input type = "text" name = "post_cintent" placeholder = "投稿内容を入力してください。">
    </div>
<div>
<!--登録ボタン-->
<button type="submit"> <img src="{{ asset('/images/post.png' ) }}" height = '80' width = '100'> </button>
</div>

@endsection