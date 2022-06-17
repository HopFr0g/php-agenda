@extends('app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/resources/css/categories.css">
    <link rel="stylesheet" type="text/css" href="/resources/css/notification-boxes.css">
@endsection

@section('js')
    <script src="/resources/js/categories.js"></script>
@endsection

@section('content')
    <div>
        <form action="{{ route('categories.store') }}" method="POST" class="form">
            @csrf
            
            @if (session('success'))
                <div class="form__notification notification success">
                    <p class="notification__text">{{ session('success') }}</p>
                </div>
            @endif
            
            @error('name')
                <div class="form__notification notification error">
                    <p class="notification__text">{{ $message }}</p>
                </div>
            @enderror
            
            <input type="text" name="name" class="fancy__input form__name">
            <input type="color" name="color" class="fancy__input form__color">
            <button type="submit" class="fancy__button-green form__submit">Create category</button>
        </form>
        
        <div class="categories">
            <h2 class="categories__title">Your categories:</h2>
            @foreach ($categories as $category)
            <div class="category">
                <a href="{{ route('categories.show', ['category' => $category->id]) }}" style="color: {{ $category->color }}" class="category__name">
                    {{ $category->name }}
                </a>

                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" class="category__delete">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="fancy__button-yellow">Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
@endsection