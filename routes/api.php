<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/signup', [apicontroller::class, 'register']);
Route::post('/login', [apicontroller::class, 'login']);
Route::post('/edit/{id}', [apicontroller::class, 'edituser']);


Route::get('/alluser', [apicontroller::class, 'getuser']);
Route::get('/user/{id}', [apicontroller::class, 'getuserbyId']);
Route::get('/delete/{id}',[apicontroller::class, 'deleteuser']);