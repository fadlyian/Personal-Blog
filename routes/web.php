<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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

    Route::controller(ArticleController::class)->group(function() {
        Route::get('/article', 'index')->name('article');
        Route::get('/article/create', 'create')->name('createArticle');
        Route::post('/article', 'store')->name('addArticle');
        Route::get('/article/{id}', 'show')->name('showArticle');
        Route::get('/article/{id}/edit', 'edit')->name('editArticle');
        Route::put('/article/{id}', 'update')->name('updateArticle');
        Route::delete('/article/{id}', 'destroy')->name('articleDestroy');
    });

    Route::controller(CategoryController::class)->group(function() {
        Route::get('/category', 'index')->name('category');
        Route::get('/category/create', 'create')->name('createCategory');
        Route::post('/category', 'store')->name('addCategory');
        Route::get('/category/{id}', 'show')->name('showCategory');
        Route::get('/category/{id}/edit', 'edit')->name('editCategory');
        Route::put('/category/{id}', 'update')->name('updateCategory');
        Route::delete('/category/{id}', 'destroy')->name('destroyCategory');
    });

});

require __DIR__.'/auth.php';
