@extends('layouts.not_logged_in')

@section('content')

@section('title', $title)

    <!--スライドショー-->
    <div class="pickup">
      <div id="cl" class="carousel slide" data-ride="carousel">
        <ol class="indicators carousel-indicators">
          @foreach($slides as $key => $slide)
            <li data-target="#cl" data-slide-to="{{$key}}" class="active"></li>
          @endforeach
        </ol>
        
        <div class="slide_carousel carousel-inner">
          @foreach($slides as $key => $slide)
            @if($slide->image !== '')
              <div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-interval="4000">
                <a href="{{route('tops.show',$slide)}}">
                  <img data-src="{{asset('storage/' .$slide->image) }}" class="d-block img-fluid lazyload">
                </a>
              </div>
            @else
              <div class="carousel-item {{ $key == 0 ? 'active' : ''}}" data-interval="4000">
                <a href="{{route('tops.show',$slide)}}">
                  <img src="{{ asset('images/no_image.png') }}" class="d-block img-fluid lazyload">
                </a>
              </div>
            @endif
            <a class="carousel-control-prev" href="#cl" data-slide="prev">
              <span class="arrow_next carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#cl" data-slide="next">
              <span class="arrow_prev carousel-control-next-icon"></span>
            </a>
          @endforeach
        </div>
      </div>
    </div>
    <main class="top_main">
      <!--最新の投稿一覧-->
      <section class="top_background">
        <h3 class="mt-5">最新の投稿一覧</h3>
      
      <ul class="img_content">
        @forelse($posts as $post)
          <div class="img_item ">
            @if($post->image !== '')
              <a href="{{route('tops.show',$post)}}"><img data-src="{{ asset('storage/' .$post->image) }}" class="lazyload">
                <p>{{ $post->user->name}}の作品</p>
              </a>
            @else
              <a href="{{route('tops.show',$post)}}">
                <img src="{{ asset('images/no_image.png') }}">
                <p>{{ $post->user->name}}の作品</p>
              </a>
            @endif 
          </div>
          @empty
          <div class="no_user">
            <li>ログインしてオリジナルのホームページを投稿してみよう！</li>
          </div>
        @endforelse
      </ul>
    </section>
    {{ $posts->links() }}
  </main>

  <footer>
    <div class="footer_box">
      <p class="text-center"><small>©&nbsp;original portfolio</small></p>
    </div>
  </footer>

@endsection