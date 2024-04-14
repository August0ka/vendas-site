@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
    <div class="d-flex align-content-center  ">
        <a href="{{ url()->previous() }}" class="btn" style="background: none; border: none; padding: 0; display: inline-flex; align-items: center;">
            <i class="bi bi-arrow-left-circle me-3" style="font-size: 25px;"></i>
        </a>
        <h3>{{ isset($category) ? 'Editando Categoria' : 'Adicionando Categoria' }}</h3>
    </div>
    <form action="{{ isset($category) ? route('categories.update', [$category->id]) : route('categories.store') }}" method="POST">

        @if(isset($category))
            @method('PUT')
        @endif

        @csrf
        <div class="form-group mt-3">    
            <div class="row">
                <div class="col-4">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : '' }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>
    </div>
@endsection