<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $tasks = Task::where('state', 'active')->orderBy('priority')->get();
        return view('task.index', ['tasks' => $tasks]);
    }
}
