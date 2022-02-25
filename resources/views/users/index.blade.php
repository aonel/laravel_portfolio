@extends('layouts.logged_in')

@section('title',$title)

@section('content')

  <main>
    <section>
      <h1 class="logo">{{$user->name}}の最新の投稿</h1>
      <div class="user_content">
        <div class="user_post">
          @forelse($posts as $post)
            <div class="user_img_item">
              @if($post->image !== '')
                <img data-src="{{asset('storage/' .$post->image) }}" class="lazyload">
              @else
                <img src="{{ asset('images/no_image.png') }}">
              @endif
            </div>
            <div class="list_text">
              <dl>
                <dt class="mb-2">制作担当</dt>
                <dd>{!! nl2br(e($post->manager)) !!}</dd>

                <dt class="mb-2">制作期間</dt>
                <dd>{{ $post->period }}</dd>

                <dt class="mb-2">コンセプト</dt>
                <dd>{!! nl2br(e($post->concept)) !!}</dd>

                <dt class="mb-2">工夫点</dt>
                <dd>{!! nl2br(e($post->ingenuity)) !!}</dd>

                @if($post->url !== "https://none")
                  <dt class="mb-2">ホームページURL</dt>
                  <dd><a href="{{ $post->url }}">{{ $post->url }}</a></dd>
                @endif
              </dl>
            </div>
          @empty
            <p class="not_posted">最新の投稿はありません</p>
          @endforelse
        </div>
        
        <div class="user_profile">
          <div class="card">
            <h5 class="card-header text-center">{{$user->name}}</h5>
            <div class="card-body text-center">
              <div class="card-text text-center" >
                @if($user->image !== '')
                  <img src="{{ \Storage::url($user->image) }}" class="rounded-circle">
                @else
                  <img src="{{ asset('images/no_image.png') }}">
                @endif
              </div>
              <div class="title mt-3 text-center">
                @if($user->profile !== '')
                  <p>{{ $user->profile}}</p>
                @else
                  <p>プロフィール未記入。</p>
                @endif
              </div>
              </div>
                <div class="card-footer text-center">
                  <div class="btn btn-group-sm">
                    <a href="{{ route('users.edit_image', $user) }}" class="btn btn-info mr-2">画像を変更</a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-info">編集</a>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer_box">
      <p class="text-center"><small>©&nbsp;original portfolio</small></p>
    </div>
  </footer>
@endsection