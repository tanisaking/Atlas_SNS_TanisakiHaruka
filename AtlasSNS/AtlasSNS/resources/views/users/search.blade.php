@extends('layouts.login')

@section('content')
<form action="" method="POST">
@csrf
    <input type = "search" name = "search" placeholder = "ユーザー名" >
    <input type = "submit"  value="検索">

</form>
<div>
    <ol>
        @foreach ($users as $user)
        <li>{{ $user->username }}</li>
        <!--フォローボタン-->
        <div class="d-flex justify-cntent-end flex-grow-1">
            @if(Auth::id() != $user_flg)
            @if(Auth::user()->isFollowing($user->id))
                <form action = "{{ route('unfollow',['user' => $user->id])}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
            @else
                <form action = "{{ route('follow',['user' => $user->id])}}" method="POST">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-primary">フォローする</button>
            @endif
            @endif
        @endforeach
    </ol>
</div>


@endsection