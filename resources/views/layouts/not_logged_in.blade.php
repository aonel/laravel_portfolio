@extends('layouts.default')

@section('header')
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top nav-tabs nav-pills">
    
    <a class="navbar-brand nav_logo" href="{{route('tops.index')}}" style="font-weight: bold; color:#444343;">オリジナルポートフォリオを投稿してみよう</a>
    
    <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse p-2" id="mainNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('tops.explanation') }}" class="nav-link btn btn-outline-secondary" style="border-bottom: solid 2px #f00707;">
            このサイトについて
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link btn btn-outline-secondary" style="border-bottom: solid 2px #0fa3f9;">
            投稿する
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link btn btn-outline-secondary" style="border-color:gray; margin:0 15px;">
            ログイン
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link btn btn-outline-secondary" style="border-color:gray;">
            新規登録
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>
@endsection