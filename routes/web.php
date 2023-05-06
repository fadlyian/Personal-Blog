<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
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
        'articles' => $article,
    ]);
});

Route::view('/about', 'about');

Route::get('/blog', function(){
    $article = Article::paginate(10);
    // $article = DB::table('articles')->paginate(10);

    return view('blog', [
        'articles' => $article,
    ]);
});


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

    // Route::resource('article', ArticleController::class);
    // Route::get('/article', [ArticleController::class, 'index'])->name('article');
    // Route::get('/article/create', [ArticleController::class, 'create'])->name('articleCreate');

    Route::controller(ArticleController::class)->group(function() {
        Route::get('/article', 'index')->name('article');
        Route::get('/article/create', 'create')->name('createArticle');
        Route::post('/article', 'store')->name('addArticle');
        Route::get('/article/{id}/edit', 'edit')->name('editArticle');
        Route::put('/article/{id}', 'update')->name('updateArticle');

        Route::delete('/article/{id}', 'destroy')->name('articleDestroy');
    });

});

require __DIR__.'/auth.php';
