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
        <button type="submit">Crear nueva tarea</button>
    </form>
@endsection