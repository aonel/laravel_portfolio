@extends('layouts.default')

@section('header')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        
        <a class="navbar-brand nav_logo" href="{{ route('posts.exhibitions') }}">OriginalPortfolio</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link">
                        投稿一覧
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('likes.index') }}" class="nav-link">
                        お気に入りリスト
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                    プロフィール
                    </a>
                </li>
            </ul>
            
            <p class="navbar-nav text-center">こんにちは、{{ \Auth::user()->name }}さん</p>
            
            <ul class="btn-group-vertical navbar-nav ml-auto mr-3 headerBtn" style="align-items: center;">
                <a href="{{route('posts.create')}}" class="nav-link btn btn-secondary" style="color: white">新規投稿</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                    <input type="submit" value="ログアウト" class="btn btn-secondary nav-link" style="color: white">
                </form>
            </ul>
        </div>
    </nav>
</header>
@endsection