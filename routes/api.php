<?php

use App\Modules\Product\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
   dd(22);
});

Route::resource('/products', ProductController::class);
