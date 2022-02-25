@extends('layouts.logged_in')

@section('title',$title)

@section('content')

  <main>
    <section>
      <div class="card card_content">
        <article class="card-body">
          <h1>{{ $title }}</h1>
          <hr>

          <form method="POST" action="{{ route('users.update',$user) }}">
            @csrf
            @method('patch')

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">名前</span>
                </div>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">プロフィール</span>
                </div>
                <textarea name="profile" rows="10" cols="40" class="form-control">{{ $user->profile}}</textarea>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" value="更新" class="btn btn-secondary btn-block"> 更新  </button>
            </div>
            [<a href="{{ route('users.index')}}">戻る</a>]
          </form>
        </article>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer_box">
      <p class="text-center"><small>©&nbsp;original portfolio</small></p>
    </div>
  </footer>
@endsection