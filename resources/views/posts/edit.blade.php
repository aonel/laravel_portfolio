@extends('layouts.logged_in')

@section('title', $title)

@section('content')

  <main>
    <section>

      <div class="card card_content">
        <article class="card-body">
          <h1>{{ $title }}</h1>
          <hr>
          <form method="POST" action="{{ route('posts.update',$post) }}">
            @csrf
            @method('patch')

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">ホームページタイトル</span>
                </div>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">制作担当</span>
                </div>
                <textarea name="manager" cols="50" rows="5" class="form-control">{{ $post->manager}}</textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">制作期間</span>
                </div>
                <input type="text" name="period" value="{{ $post->period }}" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">コンセプト</span>
                </div>
                <textarea name="concept" cols="50" rows="5" class="form-control">{{ $post->concept}}</textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">工夫点</span>
                </div>
                <textarea name="ingenuity" cols="50" rows="5" class="form-control">{{ $post->ingenuity}}</textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group edit_group_input">
                <div class="input-group-prepend">
                  <span class="input-group-text edit_input_text">ホームページのURL</span>
                </div>
                <input type="text" name="url" value="{{ $post->url }}" class="form-control">
              </div>
              <div class="edit_caution">※ホームページURLがない場合は、「https://none」と入力してください。</div>
            </div>

            <div class="form-group">
              <button type="submit" value="保存" class="btn btn-secondary btn-block"> 保存  </button>
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