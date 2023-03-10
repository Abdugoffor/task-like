<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\delete;

class CommentController extends Controller
{
    public function index(News $news)
    {
        // dd($news, Auth::user()->name);
        $models = Comment::where('news_id', $news->id)->get();
        return view('comments', ['models' => $models, 'news' => $news]);
    }

    public function addcomment(Request $request, News $news)
    {
        $request->validate([
            'text' => 'required',
        ]);

        $models = new Comment();
        $models->user_id = Auth::user()->id;
        $models->news_id = $news->id;
        $models->text = $request->text;
        $models->save();

        return redirect()->back();
    }
    public function deletecomment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
