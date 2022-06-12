@extends('app')

@section('content')
    <h2 style="color: red">Hola mundo</h2>
    
    <form action="{{ route('tasks-update', ['id' => $task->id]) }}" method="POST">
        @method('PATCH');
        @csrf
        
        @if (session('success'))
            <h6>{{ session('success') }}</h6>
        @endif
        
        @error('title')
            <h6>{{ $message }}</h6>
        @enderror
        <input type="text" name="title" value="{{ $task->title }}">
        <button type="submit">Actualizar tarea</button>
    </form>
    
    <p>Editando una entrada</p>
@endsection