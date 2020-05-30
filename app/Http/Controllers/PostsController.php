<?php

namespace App\Http\Controllers;
use App\Post;
use Storage;
use Illuminate\Http\Request;

class PostsController extends Controller
{
  public function add()
  {
      return view('post.create');
  }

  public function create(Request $request)
  {
      $post = new Post;
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('image');
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
      // アップロードした画像のフルパスを取得
      $post->image_path = Storage::disk('s3')->url($path);

      $post->save();

      return redirect('posts/create');
  }
}
