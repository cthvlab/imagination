<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DreamController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AjaxController;



Route::get('/', [DreamController::class, 'index']);


Route::resource('dreams', DreamController::class);
Route::resource('tags', TagController::class);


Route::post('ajax/store', [AjaxController::class, 'store'])->name('ajax.store');
Route::post('ajax/tagstore', [AjaxController::class, 'tagstore'])->name('ajax.tagstore');
