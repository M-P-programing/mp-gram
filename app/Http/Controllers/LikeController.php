<?php

namespace App\Http\Controllers;

use App\Like;

class LikeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function like($image_id)
  {
    $user       = \Auth::user();
    $isset_like = Like::where('user_id', $user->id)
      ->where('image_id', $image_id)
      ->count();
    if ($isset_like == 0) {
      $like           = new Like;
      $like->user_id  = (int) $user->id;
      $like->image_id = (int) $image_id;

      $like->save();

      return response()->json([
        'like' => $like,
      ]);
    } else {
      return response()->json([
        'message' => 'You already liked this post',
      ]);
    }

  }

  public function dislike($image_id)
  {
    $user = \Auth::user();
    $like = Like::where('user_id', $user->id)
      ->where('image_id', $image_id)
      ->first();
    if ($like) {
      $like->delete();

      return response()->json([
        'like'    => $like,
        'message' => 'You disliked this image',
      ]);
    } else {
      return response()->json([
        'message' => 'No likes from your part in this image',
      ]);
    }
  }
}
