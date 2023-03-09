<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function sayt()
    {
        $models = News::all();
        return view('welcome', ['models' => $models]);
    }
    public function index()
    {
        $user = Auth::user();
        $models = News::where('user_id', $user->id)->get();
        return view('news', ['models' => $models]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'text' => 'required',
        ]);

        $user = Auth::user();

        $model = new News();

        $model->title = $request->title;
        $model->description = $request->description;
        $model->text = $request->text;
        $model->user_id = $user->id;
        $model->likes = 0;
        $model->save();

        return redirect()->back()->with('text', 'Successful');
    }

    public function edit(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'text' => 'required',
        ]);

        $news->title = $request->title;
        $news->description = $request->description;
        $news->text = $request->text;
        $news->save();

        return redirect()->back()->with('text', 'Successful');
    }
    public function delete(News $news)
    {
        $news->delete();
        return redirect()->back()->with('text', 'Successful');
    }
}