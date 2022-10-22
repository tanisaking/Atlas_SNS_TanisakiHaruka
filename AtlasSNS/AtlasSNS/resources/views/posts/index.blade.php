@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<!--投稿フォーム-->
<form action = "{{ url('posts') }}" method = "POST" class = "form-horizontal">
@csrf
<!--投稿の本文-->
    <div class="form-group">
        <div class="image_2">
            <img src="{{ asset('/images/icon1.png') }}"widht = '50' height = '50'>
                <input type = "text" name = "post" placeholder = "投稿内容を入力してください。"></div><!--name = "post"が投稿の名前として送信されている-->
                    <!--登録ボタン--> 
                        <div class="image_3">
                            <button type="submit">
                    <img src="{{ asset('/images/post.png' ) }}"width = '100' height = '100' >
            </button>
        </div>
    </div>
</form>
<!--全ての投稿リスト-->
<div class="card-body">
    <div class="card-body">
        <table class="table table-striped task-table">
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->user->username }}</td>
                    <td>{{ $post->post }}</td>
                    <td>{{ $post->created_at}}<td>
                    <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form"><img src="{{ asset('/images/edit.png') }}"width = '50' height = '50'></a></td><!--更新-->
                    <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="{{ asset('/images/trash-h.png') }}"width = '50' height = '50'></a></td><!--削除-->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection