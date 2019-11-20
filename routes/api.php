<?php

use App\Http\Controllers;

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

# PUBLIC
Route::middleware([])->group(function () {

    // todo - remove me.
    Route::post('/test', Controllers\NodeEvent\CreateController::class);

});


# SDK
Route::middleware(['auth:sdk'])->group(function () {

    # NODE HARDWARE
    Route::patch('/sdk/nodes/{node}/hardware', Controllers\NodeHardware\UpdateController::class);

    # NODE EVENT
    Route::post('/sdk/nodes/{node}/events', Controllers\NodeEvent\CreateController::class);

});

# API
Route::middleware(['auth:sdk'])->group(function () {

    # USER
    Route::get('/me', Controllers\User\ReadController::class);
    Route::patch('/me', Controllers\User\UpdateController::class);
    Route::delete('/me', Controllers\User\DeleteController::class);

    # NODE
    Route::get('/nodes', Controllers\Node\ReadController::class);
    Route::post('/nodes', Controllers\Node\CreateController::class);
    Route::get('/nodes/{node}', Controllers\Node\ReadController::class);
    Route::patch('/nodes/{node}', Controllers\Node\UpdateController::class);
    Route::delete('/nodes/{node}', Controllers\Node\DeleteController::class);

    # NODE EVENT
    Route::get('/nodes/{node}/events', Controllers\NodeEvent\ListController::class);
    Route::get('/nodes/{node}/events/{nodeEvent}', Controllers\NodeEvent\ReadController::class);

});

