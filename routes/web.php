<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    $article = Article::all();

    return view('welcome', [
        'articles' => $article->reverse(),
    ]);
});

Route::view('/about', 'about');

Route::get('/blog', function(){
    $article = Article::paginate(10);

    return view('blog', [
        'articles' => $article,
    ]);
});

Route::get('/download', [ArticleController::class, 'downloadCV']);


Route::get('/dashboard', function () {
    $users = User::all();

    return view('dashboard', [
        'users' => $users,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'category' => CategoryController::class,
        'article' => ArticleController::class,
        'tag' => TagController::class,
    ]);
});

Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');

require __DIR__.'/auth.php';
