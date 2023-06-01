<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['apiJwt']], function() {
   Route::post('/cards', [CardController::class, 'store']);
   Route::get('/cards', [CardController::class, 'index']);
   Route::put('/cards/{id}', [CardController::class, 'update']);
   Route::delete('/cards/{id}', [CardController::class, 'destroy']);
});

Route::post('/login', function(Request $request) {
    $credentials = $request->only(['username', 'password']);
 
    if (!$token = auth(guard:'api')->attempt($credentials)) {
       return response()->json(['Error' => 'Unauthorized'], 401);
    }
 
    return response()->json([
       'token' => $token,
       'token_type' => 'bearer',
       'expires_in' => auth()->factory()->getTTL() * 60
    ]);
 });
