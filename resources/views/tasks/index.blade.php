@extends('app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/resources/css/tasks.css">
    <link rel="stylesheet" type="text/css" href="/resources/css/notification-boxes.css">
@endsection

@section('js')
    <script src="/resources/js/tasks.js"></script>
@endsection

@section('content')
    @if ($categories->count() > 0)
        <form action="{{ route('tasks') }}" method="POST" class="form">
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
            
                <input type="text" name="title" class="form__title fancy__input">
                <select name="category_id" class="form__category fancy__select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="form__submit fancy__button-green">Create new task</button>
        </form>
        
        <div class="tasks">
            <h2 class="tasks__title">Your tasks:</h2>
            @foreach ($tasks as $task)
                <div class="task">
                    <a href="{{ route('tasks-edit', ['id' => $task->id]) }}" class="task__name">
                        {{ $task->title }}
                    </a>
                    
                    <form action="{{ route('tasks-destroy', [$task->id]) }}" method="POST" class="task__delete">
                        @method('DELETE')
                        @csrf
                        <button class="fancy__button-yellow">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="empty">To create a new task, you must first create a category <a href="categories">here</a></p>
    @endif
@endsection