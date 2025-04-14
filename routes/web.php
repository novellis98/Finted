<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Cookie;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/article', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/article/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('/join-us', [PublicController::class, 'joinUs'])->name('joinUs.create');
    Route::post('/join-us', [PublicController::class, 'joinUsMail'])->name('joinUs.store');
});

Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');

Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor')->middleware('auth');
Route::get('/make/revisor/{email}, [revisor]', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::post('/lingua/{lang}' , [PublicController::class, 'setLanguage'])->name('setLocale');

// cookie 
Route::get('/accetta-cookie', function () {
    return response('ok')->cookie('cookie_accepted', true, 30); // 1 anno default {adesso 30 min}
});

Route::get('/rifiuta-cookie', function () {
    return response('ok')->cookie('cookie_accepted', 'false', 30);
});