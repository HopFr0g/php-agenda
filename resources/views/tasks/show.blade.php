@extends('app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/resources/css/tasks.css">
    <link rel="stylesheet" type="text/css" href="/resources/css/notification-boxes.css">
@endsection

@section('content')
    <form action="{{ route('tasks-update', ['id' => $task->id]) }}" method="POST" class="form">
        @method('PATCH')
        @csrf
        
        @if (session('success'))
            <div class="form__notification notification success">
                <p class="notification__text">{{ session('success') }}</p>
            </div>
        @endif
            
        @error('title')
            <div class="form__notification notification error">
                <p class="notification__text">{{ $message }}</p>
            </div>
        @enderror
        
        <input type="text" name="title" value="{{ $task->title }}" style="grid-column: 1 / 3;">
        <button type="submit" class="fancy__button-green" style="grid-column: 1 / 3;">Update task</button>
    </form>
@endsection