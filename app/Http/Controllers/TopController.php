<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostImageRequest;

class TopController extends Controller
{
  public function index()
  {
    $posts = Post::orderByDesc('created_at')->paginate(4);

    $slides = Post::inRandomOrder()->limit(3)->get();
    return view('tops.index', [
      'title' => '最初の画面',
      'posts' => $posts,
      'slides' => $slides,
    ]);
  }

  public function show($id)
  {
    $post = Post::find($id);
    $user = \Auth::user();
    return view('tops.show', [
      'title' => '投稿詳細',
      'post' => $post,
      'user' => $user,
    ]);
  }
}
