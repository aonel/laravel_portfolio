@extends('layouts.logged_in')

@section('title', $title)

@section('content')

  <main>
    <section>
      <h1 class="logo text-center">{{ $title }}</h1>
      <div>
        @forelse($like_posts as $post)
          <div class="list">
            <figure>
              <div>
                @if($post->image !== '')
                  <a href="{{route('posts.show',$post)}}">
                    <img data-src="{{asset('storage/' .$post->image) }}" class="lazyload">
                  </a>
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
                  <form method="post" class="like" action="{{ route('likes.toggle_like', $post) }}">
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
        @empty
        <div class="no_post">
          <li>お気に入りはありません</li>
        </div>
        @endforelse
      </div>
    </section>
    {{ $like_posts->links() }}
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