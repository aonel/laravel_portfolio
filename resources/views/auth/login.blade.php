@extends('layouts.not_logged_in')

@section('content')

  <main>
    <div class="card login_card">
      <article class="card-body">
        <h4 class="card-title text-center mb-4 mt-1">ログイン画面</h4>
        <hr>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"></span>
              </div>
              <input type="email" name="email" class="form-control" placeholder="メールアドレス" >
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"></span>
              </div>
              <input class="form-control" type="password" name="password" placeholder="******">
            </div>
          </div>
          
          <div class="form-group">
            <button type="submit" value="ログイン" class="btn btn-secondary btn-block"> ログイン  </button>
          </div>
          <p class="text-center">または<a href="{{ route('register') }}" class="btn text-primary">新規登録</a></p>
        </form>
      </article>
    </div>
  </main>

@endsection