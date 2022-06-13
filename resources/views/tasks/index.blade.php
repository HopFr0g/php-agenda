@extends('app')

@section('content')
    <h2 style="color: red">Hola mundo</h2>
    
    <form action="{{ route('tasks') }}" method="POST">
        @csrf
        
        @if (session('success'))
            <h6>{{ session('success') }}</h6>
        @endif
        
        @error('title')
            <h6>{{ $message }}</h6>
        @enderror
        @if ($categories->count() > 0)
            <input type="text" name="title">
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">Crear nueva tarea</button>
        @else
            Para crear una nueva tarea, primero debes crear una categoría <a href="categories">aquí</a>
        @endif
    </form>
    
    <div>
        @foreach ($tasks as $task)
            <div>
                <div>
                    <a href="{{ route('tasks-edit', ['id' => $task->id]) }}">
                        {{ $task->title }}
                    </a>
                </div>
                
                <div>
                    <form action="{{ route('tasks-destroy', [$task->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button>Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection