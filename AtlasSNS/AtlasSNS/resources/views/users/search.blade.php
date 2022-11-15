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
        @endforeach
    </ol>
</div>


@endsection