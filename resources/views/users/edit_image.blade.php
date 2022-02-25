@extends('layouts.logged_in')

@section('title',$title)

@section('content')

  <main>
    <section>
      <div class="card card_content">
        <article class="card-body">
          <h1>{{ $title }}</h1>
          <hr>

          @if($user->image !== '')
            <div class="user_imge">
              <img src="{{ \Storage::url($user->image) }}">
            </div>
          @else
            画像はありません。
          @endif
          <form
            method="POST"
            action="{{ route('users.update_image', $user) }}"
            enctype="multipart/form-data"
          >
            @csrf
            @method('patch')

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">画像を選択</span>
                </div>
                <input type="file" name="image" class="form-control">
              </div>
              <div class="edit_caution">※画像サイズは1024KBまでです。サイズが大きい場合はお手数ですが、圧縮サイトなどで圧縮を行いご投稿お願いします。</div>
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