<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HelpTicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('mainPage');
Route::resource('/articles', ArticleController::class);

Route::get('/tags/{tag}', [ArticleController::class, 'tag'])->name('articles.tag'); //@TODO в бущуем будет переписано на фильтрацию самих article (пока тут)

Route::get('/contacts', [HelpTicketController::class, 'create']);
Route::post('/contacts', [HelpTicketController::class, 'store']);
Route::get('/admin/feedback/', [HelpTicketController::class, 'index']);




