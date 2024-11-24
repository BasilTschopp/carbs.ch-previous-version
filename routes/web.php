<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ContactController;

Route::get('/', [FoodController::class, 'getCategories']);
Route::get('/info', [InfoController::class, 'info'])->name('info');
Route::get('/Categories', [FoodController::class, 'getCategories'])->name('categories');
Route::get('/Search', [FoodController::class, 'searchFood'])->name('search.food');
Route::get('/Items', [FoodController::class, 'getItems'])->name('items');
Route::get('/AjaxFoodItems', [FoodController::class, 'ajaxItems'])->name('ajax.items');
Route::get('/AjaxFoodServings', [FoodController::class, 'ajaxServings'])->name('ajax.servings');;
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');