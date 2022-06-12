<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'title'=>'required|min:3'
        ]);
        $task = new Task;
        $task->title = $request->title;
        $task->save();
        
        return redirect()->route('tasks')->with('success', 'task added successfully');
    }
    
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }
    
    public function show($id) {
        $task = Task::find($id);
        return view('tasks.show', ['task' => $task]);
    }
}
