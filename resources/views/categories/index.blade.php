@extends('app');

@section('content')
    <div>
        <div>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                
                @if (session('success'))
                    <h6>{{ session('success') }}</h6>
                @endif
                
                @error('name')
                    <h6>{{ $message }}</h6>
                @enderror
                <input type="text" name="name">
                <input type="color" name="color">
                <button type="submit">Crear nueva categoria</button>
            </form>
        </div>
        
        <div>
            @foreach ($categories as $category)
            <div>
                <div>
                    <a href="{{ route('categories.show', ['category' => $category->id]) }}" style="background-color: {{ $category->color }}">
                        {{ $category->name }}
                    </a>
                </div>

                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">eliminar categoía</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
@endsection