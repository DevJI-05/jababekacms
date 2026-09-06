<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarbonTrackerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuPageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/carbon-tracker', [CarbonTrackerController::class, 'index'])->name('carbon-tracker');

Route::get('/lang/{locale}', function (string $locale) {
    abort_unless(array_key_exists($locale, config('localization.supported')), 404);

    session(['locale' => $locale]);

    return back();
})->name('locale.switch')->where('locale', '[a-z]{2}');

Route::get('/events', [ArticleController::class, 'events'])->name('articles.events');
Route::get('/news', [ArticleController::class, 'news'])->name('articles.news');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
Route::get('/tenants/{tenant:slug}', [TenantController::class, 'show'])->name('tenants.show');

Route::get('/{menu}', [MenuPageController::class, 'show'])->name('menu.show');
Route::get('/{menu}/{section}', [MenuPageController::class, 'showSection'])->name('menu.section.show');
Route::get('/{menu}/{section}/{content}', [MenuPageController::class, 'showContent'])->name('menu.content.show');
