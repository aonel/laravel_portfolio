@extends('layouts.not_logged_in')

@section('content')

  <main>
    <div class="card login_card">
      <article class="card-body">
        <h4 class="card-title text-center mb-4 mt-1">新規登録</h4>
        <hr>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"></span>
              </div>
              <input type="text" name="name" class="form-control" placeholder="ユーザー名" >
            </div> 
          </div>

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
              <input type="password" name="password" class="form-control" placeholder="パスワード" >
            </div> 
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"></span>
              </div>
              <input type="password" name="password_confirmation" class="form-control" placeholder="パスワード（確認用）" >
            </div> 
          </div>

          <div class="form-group">
            <button type="submit" value="登録" class="btn btn-secondary btn-block"> 登録  </button>
          </div>
        </form>
      </article>
    </div>
  </main>
  
@endsection