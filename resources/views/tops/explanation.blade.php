@extends('layouts.not_logged_in')

@section('title', $title)

@section('content')

  <main class="top_main">
    <section class="top_explanation">
      <h1>このサイトについて</h1>
      <div class="top_explanation_text">
        <h3>このサイトの目的は？</h3>
        <p>「誰もが気軽に投稿できる」をコンセプトに皆様が作ったポートフォリオを公開できます。
          初心者から上級者まで自身が制作したものを公開し、「独学で学びポートフォリオ制作したけど他の皆はどんな作品を作ってるのかな？」と
          思っている人もいると思います！このサイトでは気軽に投稿できるので皆様が制作したポートフォリオを共有してみましょう！
        </p>
      </div>

      <div class="top_img_content">
        <ul class="top_img_main">
          <li>
            <p><img src="{{ asset('images/img01.png') }}"></p>
          </li>
          <li>
            <p><img src="{{ asset('images/img02.png') }}"></p>
          </li>
          <li>
            <p><img src="{{ asset('images/img03.png') }}"></p>
          </li>
        </ul>
      </div>

      <div class="top_registration">
        <h4>投稿してみよう！こちらから無料で登録！</h4>
        <p>アカウントをお持ちの場合は、こちらからログイン</p>
        <div class="top_registration_content">
          <div class="top_registration_login">
            <a href="{{ route('register') }}" class="btn btn-outline-secondary">
              新規登録
            </a>
          </div>
          <div class="top_registration_new">
            <a href="{{ route('login') }}" class="btn btn-outline-secondary">
              ログイン
            </a>
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