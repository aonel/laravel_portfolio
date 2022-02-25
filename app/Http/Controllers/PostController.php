<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Like;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostImageRequest;
use App\Http\Requests\PostImageSecondRequest;


class PostController extends Controller
{
  // ログイン後トップページ
  public function exhibitions(Request $id)
  {
    $user = \Auth::user($id);
    $posts = Post::orderByDesc('created_at')->paginate(4);
    $slides = Post::inRandomOrder()->limit(3)->get();

    return view('posts.exhibitions', [
      'title' => '全ユーザー投稿一覧',
      'user' => $user,
      'posts' => $posts,
      'slides' => $slides,
    ]);
  }

  // 投稿一覧
  public function index()
  {
    $posts = \Auth::user()->posts()->latest()->paginate(4);
    return view('posts.index', [
      'title' => '投稿一覧',
      'posts' => $posts,
    ]);
  }

  // 新規投稿フォーム
  public function create()
  {
    return view('posts.create', [
      'title' => '新規投稿',
    ]);
  }

  // 投稿追加処理
  public function store(PostRequest $request)
  {
    //画像投稿処理
    $path = '';
    $image = $request->file('image');
    if (isset($image) === true) {
      $path = $image->store('photos', 'public');
    }

    $second_path = '';
    $image = $request->file('image2');
    if (isset($image) === true) {
      $second_path = $image->store('photos', 'public');
    }

    Post::create([
      'user_id' => \Auth::user()->id,
      'title'  => $request->title,
      'manager'  => $request->manager,
      'period'  => $request->period,
      'concept'  => $request->concept,
      'ingenuity'  => $request->ingenuity,
      'url'  => $request->url,
      'image' => $path,
      'image2' => $second_path,
    ]);
    session()->flash('success', '投稿を追加しました');
    return redirect()->route('posts.index');
  }


  //画像変更処理
  public function editImage($id)
  {
    $post = Post::find($id);
    return view('posts.edit_image', [
      'title' => '画像の変更画面',
      'post' => $post,
    ]);
  }

  //画像2変更処理
  public function editImageSecond($id)
  {
    $post = Post::find($id);
    return view('posts.edit_image_second', [
      'title' => '全体画像の変更画面',
      'post' => $post,
    ]);
  }

  //画像変更処理
  public function updateImage($id, PostImageRequest $request)
  {
    $path = '';
    $image = $request->file('image');

    if (isset($image) === true) {
      $path = $image->store('photos', 'public');
    }

    $post = Post::find($id);

    //変更前の画像削除
    if ($post->image !== '') {
      \Storage::disk('public')->delete(\Storage::url($post->image));
    }

    $post->update([
      'image' => $path,
    ]);
    session()->flash('success', '画像を変更しました');
    return redirect()->route('posts.index');
  }

  //画像2変更処理
  public function updateImageSecond($id, PostImageSecondRequest $request)
  {
    $second_path = '';
    $image = $request->file('image2');

    if (isset($image) === true) {
      $second_path = $image->store('photos', 'public');
    }

    $post = Post::find($id);

    //変更前の画像削除
    if ($post->image2 !== '') {
      \Storage::disk('public')->delete(\Storage::url($post->image2));
    }

    $post->update([
      'image2' => $second_path,
    ]);
    session()->flash('success', '画像を変更しました');
    return redirect()->route('posts.show', $id);
  }

  // 投稿詳細
  public function show($id)
  {
    $post = Post::find($id);
    $user = \Auth::user();
    return view('posts.show', [
      'title' => '投稿詳細',
      'post' => $post,
      'user' => $user,
    ]);
  }

  // 投稿編集フォーム
  public function edit($id)
  {
    $post = Post::find($id);
    return view('posts.edit', [
      'title' => '投稿を編集',
      'post' => $post,
    ]);
  }

  // 投稿更新処理
  public function update($id, PostRequest $request)
  {
    $post = Post::find($id);
    $post->update($request->only(['title', 'manager', 'period', 'concept', 'ingenuity', 'url']));
    session()->flash('success', '投稿を編集しました');
    return redirect()->route('posts.index');
  }

  // 投稿削除処理
  public function destroy($id)
  {
    $post = Post::find($id);

    //画像の削除
    if ($post->image !== '') {
      \Storage::disk('public')->delete($post->image);
    }
    if ($post->image2 !== '') {
      \Storage::disk('public')->delete($post->image2);
    }

    $post->delete();
    \Session::flash('success', '投稿を削除しました');
    return redirect()->route('posts.index');
  }


  //いいね機能
  public function toggleLike($id)
  {
    $user = \Auth::user();
    $post = Post::find($id);

    if ($post->isLikedBy($user)) {
      // いいねの取り消し
      $post->likes->where('user_id', $user->id)->first()->delete();
      \Session::flash('success', 'いいねを取り消しました');
    } else {
      // いいねを設定
      Like::create([
        'user_id' => $user->id,
        'post_id' => $post->id,
      ]);
      \Session::flash('success', 'いいねしました');
    }
    return redirect()->route('posts.show', $id);
  }
}
