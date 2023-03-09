<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(News $news)
    {
        $user = Auth::user();
        $models = Like::where('user_id', $user->id)->where('news_id', $news->id)->get();

        if ($models->count() > 0) {

            $news->likes = $news->likes - 1;
            $news->save();
            Like::where('user_id', $user->id)->where('news_id', $news->id)->delete();

            return redirect()->back();
        } else {

            $news->likes = $news->likes + 1;
            $news->save();

            $like = new Like();
            $like->user_id = $user->id;
            $like->news_id = $news->id;
            $like->save();
            return redirect()->back();
        }
    }
}
