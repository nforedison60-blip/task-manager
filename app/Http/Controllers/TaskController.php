<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        Task::create(['title' => $request->title]);
        return redirect('/tasks');
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect('/tasks');
    }
}