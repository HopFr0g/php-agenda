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
        <input type="text" name="title">
        <select name="category_id">
            <option value="3">Trabajo</option>
        </select>
        <button type="submit">Crear nueva tarea</button>
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