@extends('admin.layouts.app')

@section('content')
    <div class="container">
    <h1>{{ isset($category) ? 'Editando Categoria' : 'Adicionando Categoria' }}</h1>
    <form action="{{ isset($category) ? route('categories.update', [$category->id]) : route('categories.store') }}" method="POST">

        @if(isset($category))
            @method('PUT')
        @endif

        @csrf
        <div class="form-group">    
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    </div>


@endsection