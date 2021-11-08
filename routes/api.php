<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreTaskRequest;

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
    Route::get('tasks', function (Request $request) {
        $searchValue = $request->input('search') ?? '';
        $tasks = Task::where('state', '!=', 'delete')->orderBy('priority')->orderByDesc('id');

        if ($searchValue) {
            $searchValue = '%' . $searchValue . '%';
            $tasks->where('title', 'like',  $searchValue);
        }

        return response()->json($tasks->get(), 200);
    });

    Route::get('tasks/{id}', function ($id) {
        $tasks = Task::findOrFail($id); //404 if not exists
        return response()->json($tasks, 200);
    });

    Route::put('tasks', function (Request $request) {
        $requestValues = $request->all();
        if (!empty($requestValues['state'])) {
            if ($requestValues['state'] == 'true') {
                $requestValues['state'] = 'done';
            } else if ($requestValues['state'] == 'false') {
                $requestValues['state'] = 'active';
            }
        }

        $state = Task::findOrFail($request->input('id'))->update($requestValues);
        return response()->json($state, 200);
    });

    Route::post('tasks', function (StoreTaskRequest $request) {
        $state = Task::create($request->all());
        return response()->json($state, 200);
    });

    Route::delete('tasks', function (Request $request) {
        $isAll = $request->input('all');
        if ($isAll) {
            $state = Task::where("state", "done")->update(['state' => 'delete']);
        }
        return response()->json($state, 200);
    });

    Route::delete('tasks/{id}', function ($id) {
        $state = Task::findOrFail($id)->update(['state' => 'delete']);
        return response()->json($state, 200);
    });
});
