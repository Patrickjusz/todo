<?php

use App\Models\Task;
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

//API PROTECTION
Route::middleware(['auth.apikey'])->group(function () {
    Route::get('tasks', function () {
        $tasks = Task::where('state', 'active')->orderBy('priority')->get();
        return response()->json($tasks, 200);
    });

    Route::get('tasks/{id}', function ($id) {
        $tasks = Task::findOrFail($id); //404 if not exists
        return response()->json($tasks, 200);
    });

    Route::put('tasks', function () {
        //
    });

    Route::delete('tasks/{id}', function ($id) {
        $state = Task::findOrFail($id)->update(['state' => 'done']);
        return response()->json($state, 200);
    });

    Route::post('tasks', function () {
        //
    });
});
