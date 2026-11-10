<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/comments', [PortfolioController::class, 'storeComment'])->name('portfolio.comments.store');
Route::post('/comments/{comment}/like', [PortfolioController::class, 'likeComment'])->name('portfolio.comments.like');
Route::post('/contact', [PortfolioController::class, 'storeContact'])->name('portfolio.contact.store');
Route::get('/download-cv', [PortfolioController::class, 'downloadCv'])->name('portfolio.cv');
