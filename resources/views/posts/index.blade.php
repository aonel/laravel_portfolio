@extends('layouts.logged_in')

@section('title', $title)

@section('content')

  <main>
    <section>
      <h1 class="logo text-center">{{ $title }}</h1>
      <div>
        @forelse($posts as $post)
          <div class="list">
            <figure>
              <div>
                @if($post->image !== '')
                  <a href="{{route('posts.show',$post)}}">
                    <img data-src="{{asset('storage/' .$post->image) }}" class="lazyload">
                  </a>
                @else
                  <a href="{{route('posts.show',$post)}}">
                    <img src="{{ asset('images/no_image.png') }}">
                  </a>
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

                @if($post->url !== "https://none")
                  <dt>ホームページURL</dt>
                  <dd><a href="{{ $post->url }}">{{ $post->url }}</a></dd>
                @endif
              </dl>

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
                  <input type="submit" value="削除" class="delete btn btn-secondary">
                </form>
              </div>
            </div>
          </div>
        @empty
          <li>オリジナルのホームページを投稿してみよう！</li>
        @endforelse
      </div>
    </section>
    {{ $posts->links() }}
  </main>

  <footer>
    <div class="footer_box">
      <p class="text-center"><small>©&nbsp;original portfolio</small></p>
    </div>
  </footer>
@endsection