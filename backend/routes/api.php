<?php

use Illuminate\Http\Request;
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

Route::get('/clients', function () {
    $clients = \App\Models\Client::all();
   return response()->json($clients);
});

Route::post('/clients/create', function (Request $request) {
    \App\Models\Activite::create([
        'nom' => 'test',
        'date' => Now(),
        'description' => 'dsgzdgdzdd',
        'client_id' => 15,
    ]);

    return response(200)->json(['success' => 'C bon ça marche']);
});
