@extends('app')

@section('content')
    <div>
        <div>
        <form  method="POST" action="{{route('categories.update',['category' => $category->id])}}">
            @method('PATCH')
            @csrf

            <div>

            @error('name')
                <div>{{ $message }}</div>
            @enderror

            @error('color')
                <div>{{ $message }}</div>
            @enderror

            @if (session('success'))
                    <h6>{{ session('success') }}</h6>
            @endif

                <label for="exampleFormControlInput1">Nombre de la categoría</label>
                <input type="text" name="name" id="exampleFormControlInput1" placeholder="Hogar" value="{{ $category->name }}">
                
                <label for="exampleColorInput">Escoge un color para la categoría</label>
                <input type="color"name="color" id="exampleColorInput" value="{{ $category->color }}" title="Choose your color">

                <input type="submit" value="Actualizar tarea"/>
            </div>
        </form>

        <div >
        @if ($category->tasks->count() > 0)
            @foreach ($category->tasks as $task)
                <div>
                    <div>
                        <a href="{{ route('tasks-edit', ['id' => $task->id]) }}">{{ $task->title }}</a>
                    </div>

                    <div>
                        <form action="{{ route('tasks-destroy', [$task->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button>Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach    
        @else
            No hay tareas para esta categoría
        @endif
        
        </div>
        </div>
    </div>
@endsection