<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CacheController;

Route::get('/', [FoodController::class, 'getCategories']);
Route::get('/info-general', [InfoController::class, 'getGeneral'])->name('info');

/* --- User --- */
Route::get('/SignIn', [LoginController::class, 'getGeneral'])->name('sign.in');
Route::get('/SignUp', [LoginController::class, 'getGeneral'])->name('sign.up');
Route::get('/SignOut', [LoginController::class, 'getGeneral'])->name('sign.out');

/* --- Food --- */
Route::get('/Categories', [FoodController::class, 'getCategories'])->name('categories');
Route::get('/Search', [FoodController::class, 'searchFood'])->name('search.food');
Route::get('/Items', [FoodController::class, 'getItems'])->name('items');
Route::get('/AjaxFoodItems', [FoodController::class, 'ajaxItems'])->name('ajax.items');
Route::get('/AjaxFoodServings', [FoodController::class, 'ajaxServings'])->name('ajax.servings');

/* --- Contact --- */
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

/* --- Legal information --- */
Route::get('/Imprint', [InfoController::class, 'getImprint'])->name('imprint');
Route::get('/PrivacyPolicy', [InfoController::class, 'getPrivacyPolicy'])->name('privacy.policy');

/* --- Tech --- */
Route::get('/ClearCache', [CacheController::class, 'clearCache']);