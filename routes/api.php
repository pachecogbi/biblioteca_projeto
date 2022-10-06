<?php

use App\Http\Controllers\Api\AutoresController;
use App\Http\Controllers\Api\LivrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/autores', AutoresController::class);
    Route::apiResource('/livros', LivrosController::class);
});

Route::post('/login', function (Request $request) {
    $credenciais = $request->only(['email', 'password']);
    if (Auth::attempt($credenciais) === false){
        return response()->json('Unauthorized', 401);
    }

    $user = Auth::user();
    $token = $user->createToken('token');

    return response()->json($token->plainTextToken);

});
