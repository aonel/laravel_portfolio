<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Like;

class LikeController extends Controller
{
  public function index()
  {
    $like_posts = \Auth::user()->likePosts()->orderBy('likes.created_at', 'desc')->paginate(4);
    $user = \Auth::user();
    return view('likes.index', [
      'title' => 'お気に入り一覧',
      'like_posts' => $like_posts,
      'user' => $user,
    ]);
  }

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
    return redirect()->route('likes.index');
  }
}
