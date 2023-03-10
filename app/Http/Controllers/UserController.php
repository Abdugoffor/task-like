<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Models\Comment;
use App\Models\News;
use Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $models = User::where('role_id', '!=', 1)->paginate(5);
        return view('users', ['models' => $models]);
    }
    public function edituser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,username',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back();
    }
    public function deleteuser(User $user)
    {
        $user->delete();
        $comment = Comment::where('user_id', $user->id)->delete();
        $news = News::where('user_id', $user->id)->delete();
        return redirect()->back();
    }
    public function sendemail(User $user)
    {
        $mailData = [
            'title' => 'Текст заголовка',
            'body' => 'Основной текст'
        ];

        Mail::to($user->email)->send(new DemoMail($mailData));

        return redirect()->back();
    }
}
