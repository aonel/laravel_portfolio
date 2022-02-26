@extends('layouts.logged_in')

@section('title', $title)

@section('content')
  <main>
    <section>
      <div class="card card_content">
        <article class="card-body">
          <h1>{{ $title }}</h1>
          <hr>
          <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" onsubmit="retrun check()">
            @csrf

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">全体画像</span>
                </div>
                <input type="file" name="image2" class="form-control" style="padding-left :20%;">
              </div>
              <div class="edit_caution">※大きさは200 × 200以上、画像サイズは1024KB以下です。サイズが大きい場合はお手数ですが、圧縮サイトなどで圧縮を行いご投稿お願いします。</div>
            </div>

            <div class="form-group">
              <button type="submit" value="設定" class="btn btn-secondary btn-block"> 設定  </button>
            </div>

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

