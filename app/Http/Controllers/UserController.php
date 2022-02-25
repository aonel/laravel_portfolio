<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserImageRequest;

use App\Http\Requests\UserRequest;

use App\User;
use App\Post;

class UserController extends Controller
{
    public function index(Request $id)
    {
        $user = \Auth::user($id);
        $posts = \Auth::user()->posts()->limit(1)->latest()->get();

        return view('users.index', [
            'title' => 'プロフィール',
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', [
            'title' => 'プロフィール編集',
            'user' => $user,
        ]);
    }

    public function update($id, UserRequest $request)
    {
        $user = User::find($id);
        $user->update($request->only(['name', 'profile']));

        session()->flash('success', 'プロフィールを更新しました。');
        return redirect()->route('users.index');
    }

    public function editImage($id)
    {
        $user = User::find($id);
        return view('users.edit_image', [
            'title' => 'プロフィール画像編集',
            'user' => $user,
        ]);
    }

    public function updateImage($id, UserImageRequest $request)
    {
        $path = '';
        $image = $request->file('image');

        if (isset($image) === true) {
            $path = $image->store('photos', 'public');
        }

        $user = User::find($id);

        if ($user->image !== '') {
            \Storage::disk('public')->delete(\Storage::url($user->image));
        }

        $user->update([
            'image' => $path,
        ]);

        session()->flash('success', '画像を変更しました');
        return redirect()->route('users.index');
    }
}
