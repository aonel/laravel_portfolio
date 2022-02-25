@extends('layouts.not_logged_in')

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

              @if($post->url !== "https://none")
                <dt>ホームページURL</dt>
                <dd><a href="{{ $post->url }}">{{ $post->url }}</a></dd>
              @endif
            </dl>
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
          @else
            <p class="no_full_screen">全体表示の画像はありません</p>
            <img src="{{ asset('images/no_image.png') }}">
          @endif
        </div>
    </section>
  </main>
  
  <footer>
    <div class="footer_box">
      <p class="text-center"><small>©&nbsp;original portfolio</small></p>
    </div>
  </footer>
@endsection