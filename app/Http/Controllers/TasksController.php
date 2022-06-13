<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TasksController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'title'=>'required|min:3'
        ]);
        $task = new Task;
        $task->title = $request->title;
        $task->category_id = $request->category_id;
        $task->save();
        
        return redirect()->route('tasks')->with('success', 'task added successfully');
    }
    
    public function index() {
        $tasks = Task::all();
        $categories = Category::all();
        return view('tasks.index', ['tasks' => $tasks, 'categories' => $categories]); // Lo que está entre corchetes son los parámetros que paso y pueden utilizarse en el archivo index
    }
    
    public function show($id) {
        $task = Task::find($id);
        return view('tasks.show', ['task' => $task]);
    }
    
    public function update(Request $request, $id) {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->save();
        
        // return view('tasks.index', ['success' => 'Tarea actualizada']);
        return redirect()->route('tasks')->with('success', 'Task updated successfully');
    }
    
    public function destroy($id) {
        $task = Task::find($id);
        $task->delete();
        
        return redirect()->route('tasks')->with('success', 'Tarea eliminada');
    }
}
