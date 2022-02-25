@extends('layouts.logged_in')

@section('title', $title)

@section('content')

  <main>
    <section>
      <h1 class="logo text-center">{{ $title }}</h1>
      <div class="list">
        <figure>
          <div>
            @if($post->image !== '')
              <img data-src="{{asset('storage/' .$post->image) }}" class="lazyload">
            @else
              <img src="{{ asset('images/no_image.png') }}">
            @endif
          </div>
          <figcaption >{{ $post->title }}</figcaption>
        </figure>

        <div class="list_text">
          <dl>
            <dt>制作担当</dt>
            <dd>{!! nl2br(e($post->manager)) !!}</dd>
            
            <dt>制作期間</dt>
            <dd>{{ $post->period }}</dd>
            
            <dt>コンセプト</dt>
            <dd>{!! nl2br(e($post->concept)) !!}</dd>
            
            <dt>工夫点</dt>
            <dd>{!! nl2br(e($post->ingenuity)) !!}</dd>

            <dt>お気に入り</dt>
            <dd>
              <a class="like_button" style="font-size:20px;">
                {{ $post->isLikedBy(Auth::user()) ? '★' : '☆' }}
              </a>
              <form method="post" class="like" action="{{ route('posts.toggle_like', $post) }}">
                @csrf
                @method('patch')
              </form>
            </dd>
            
            @if($post->url !== "https://none")
              <dt>ホームページURL</dt>
              <dd><a href="{{ $post->url }}">{{ $post->url }}</a></dd>
            @endif
          </dl>

          @if($post->user_id === $user->id)
            <div class="show_change">
              <button class="btn btn-primary show_edit" onclick="location.href='{{ route('posts.edit',$post) }}'">
                編集
              </button>
              <button class="btn btn-primary" onclick="location.href='{{ route('posts.edit_image',$post) }}'">
                画像を変更
              </button>
              <form method="POST" action="{{ route('posts.destroy',$post)}}" class=show_form>
                @csrf
                @method('delete')
                <input type="submit" value="投稿を削除" class="delete btn btn-secondary">
              </form>
            </div>
          @endif
        </div>
      </div>

        <div class="full_screen">
          <h1 class="logo">画像の一部を全体表示</h1>
          @if($post->image2 !== '')
            <div class="modal-main" data-toggle="modal" data-target="#modal1">
              <img data-src="{{asset('storage/' .$post->image2) }}" class="img-fluid lazyload " >
            </div>

            <div class="modal fade" id="modal1">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h3 class=“modal-title”>全体表示</h3>
                          <button class="close" data-dismiss="modal">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <img data-src="{{asset('storage/' .$post->image2) }}" class="lazyload " >
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-primary" data-dismiss="modal">確認</button>
                      </div>
                  </div>
              </div>
            </div>

            @if($post->user_id === $user->id)
              <div class="full_screen_btn">
                <button class="btn btn-primary" onclick="location.href='{{ route('posts.edit_image_second',$post) }}'">
                  画像を変更
                </button>
              </div>
            @endif
          @else
          <p class="no_full_screen">全体表示の画像はありません</p>
          <img src="{{ asset('images/no_image.png') }}">
          @if($post->user_id === $user->id)
            <div class="full_screen_btn">
              <button class="btn btn-primary" onclick="location.href='{{ route('posts.edit_image_second',$post) }}'">
                画像を変更
              </button>
            </div>
          @endif
        @endif
        </div>

    </section>
  </main>

  <footer>
    <div class="footer_box">
      <p class="text-center"><small>©&nbsp;original portfolio</small></p>
    </div>
  </footer>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
      /* global $ */
      $('.like_button').on('click', (event) => {
          $(event.currentTarget).next().submit();
      })
    </script>
@endsection