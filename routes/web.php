<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HelpTicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles/create', [ArticleController::class, 'create']);
Route::post('/articles', [ArticleController::class, 'store']);
Route::get('/articles/{slug}', [ArticleController::class, 'detail']);

Route::get('/contacts', [HelpTicketController::class, 'create']);
Route::post('/contacts', [HelpTicketController::class, 'store']);
Route::get('/admin/feedback/', [HelpTicketController::class, 'index']);




