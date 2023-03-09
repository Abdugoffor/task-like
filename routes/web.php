<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Models\Like;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('sayt');
Route::get('/', [NewsController::class, 'sayt'])->name('sayt');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/kabinet', [NewsController::class, 'index'])->name('kabinet');
Route::post('/addnews', [NewsController::class, 'store'])->name('addnews');
Route::put('/editnews/{news}', [NewsController::class, 'edit'])->name('editnews');
Route::post('/deletenews/{news}', [NewsController::class, 'delete'])->name('deletenews');
Route::get('/comment/{news}', [CommentController::class, 'index'])->name('comment');
Route::post('/addcomment/{news}', [CommentController::class, 'addcomment'])->name('addcomment');
Route::get('/like/{news}', [LikeController::class, 'store'])->name('like');


require __DIR__ . '/auth.php';
