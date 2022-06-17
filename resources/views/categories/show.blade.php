@extends('app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/resources/css/categories.css">
    <link rel="stylesheet" type="text/css" href="/resources/css/notification-boxes.css">
@endsection

@section('content')
    <form  method="POST" action="{{route('categories.update',['category' => $category->id])}}" class="form">
        @method('PATCH')
        @csrf
        
        @error('name')
            <div class="form__notification notification error">
                <p class="notification__text">{{ $message }}</p>
            </div>
        @enderror

        @error('color')
            <div class="form__notification notification error">
                <p class="notification__text">{{ $message }}</p>
            </div>
        @enderror
            
        @if (session('success'))
            <div class="form__notification notification error">
                <p class="notification__text">{{ session('success') }}</p>
            </div>
        @endif

        <input type="text" name="name" value="{{ $category->name }}" class="form__name fancy__input">
        
        <input type="color" name="color" value="{{ $category->color }}" class="form__color fancy__input">

        <input type="submit" value="Update task" class="form__submit fancy__button-green"/>
    </form>

    <div class="categories">
        @if ($category->tasks->count() > 0)
            <h2 class="categories__title">Tasks in this category:</h2>
        
            @foreach ($category->tasks as $task)
                <div class="category">
                    <a href="{{ route('tasks-edit', ['id' => $task->id]) }}" class="category__name">{{ $task->title }}</a>

                    <form action="{{ route('tasks-destroy', [$task->id]) }}" method="POST" class="category__delete">
                        @method('DELETE')
                        @csrf
                        <button class="fancy__button-yellow">Eliminar</button>
                    </form>
                </div>
            @endforeach    
        @else
            <h2 class="categories__title">There are no tasks for this category yet</h2>
        @endif
    </div>
@endsection