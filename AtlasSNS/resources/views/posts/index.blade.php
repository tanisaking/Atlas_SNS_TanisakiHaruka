@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<!--バリデーションエラーの表示-->

<!--投稿フォーム-->
<form action = "{{ url('posts') }}" method = "POST" class = "form-horizontal">
@csrf
<!--投稿の本文-->
<div class="form-group">
    <div class="image_2">
        <img src="{{ asset('/images/icon1.png') }}"widht = '50' height = '50'></div>
    <div class="text_1">
        <input type = "text" name = "post" placeholder = "投稿内容を入力してください。"></div>
    </div>
<div>
</form>
<!--登録ボタン-->
<div class="form-group">
    <div class="image_3">
        <img src="{{ asset('/images/post.png' ) }}"width = '100' height = '100' > 
    </div>
</div>

<!--全ての投稿リスト-->
<div class="card" style="width: 18rem;">

@endsection