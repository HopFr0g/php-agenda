<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create() {}

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'color' => 'required|max:7'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->color = $request->color;
        $category->save();
        
        return redirect()->route('categories.index')->with('success', 'Nueva categoría agregada');
    }

    public function show($id) {
        $category = Category::find($id);
        
        return view('categories.show', ['category' => $category]);
    }

    public function edit($id) {}

    public function update(Request $request, $id) {
        $category = Category::find($id);
        $category->name = $category->name;
        $category->color = $category->color;
        $category->save();
        
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada');
    }

    public function destroy($id) {
        $category = Category::find($id);
        
        $category->tasks()->each(function($task) {
            $task->delete();
        });
        
        $category->delete();
        
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');   
    }
}
