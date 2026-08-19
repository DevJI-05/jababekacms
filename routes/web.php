<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuPageController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/lang/{locale}', function (string $locale) {
    abort_unless(array_key_exists($locale, config('localization.supported')), 404);

    session(['locale' => $locale]);

    return back();
})->name('locale.switch')->where('locale', '[a-z]{2}');

Route::get('/events', [ArticleController::class, 'events'])->name('articles.events');
Route::get('/news', [ArticleController::class, 'news'])->name('articles.news');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/{menu}', [MenuPageController::class, 'show'])->name('menu.show');
Route::get('/{menu}/{section}', [MenuPageController::class, 'showSection'])->name('menu.section.show');
Route::get('/{menu}/{section}/{content}', [MenuPageController::class, 'showContent'])->name('menu.content.show');
