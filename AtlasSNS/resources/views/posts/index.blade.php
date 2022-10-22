@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->
<<<<<<< HEAD
=======
<!--バリデーションエラーの表示-->

>>>>>>> a524951f82bb5d2b6802de31eea57025fcda105b
<!--投稿フォーム-->
<form action = "{{ url('posts') }}" method = "POST" class = "form-horizontal">
@csrf
<!--投稿の本文-->
<<<<<<< HEAD
    <div class="form-group">
        <div class="image_2">
            <img src="{{ asset('/images/icon1.png') }}"widht = '50' height = '50'>
                    <input type = "text" name = "post" placeholder = "投稿内容を入力してください。"></div><!--name = "post"が投稿の名前として送信されている-->
    </div>
<!--登録ボタン-->
    <div class="form-group"> 
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
                    <td>{{ $post->created_at}}

                    <td>
                        <a class="btn btn-primary" ><img src="{{ asset('/images/edit.png') }}"width = '50' height = '50'></a>
                        <a class="btn btn-primary" ><img src="{{ asset('/images/trash-h.png') }}"width = '50' height = '50'></a>
                        
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
=======
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
>>>>>>> a524951f82bb5d2b6802de31eea57025fcda105b

@endsection