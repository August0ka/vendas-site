@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{{ isset($product) ? 'Adicionando Produto' : 'Editando Produto' }}</h1>
    <form action="{{ isset($product) ? route('products.update', [$product->id]) : route('products.store') }}" method="{{ isset($product) ? 'PUT' : 'POST' }}">
        @csrf
        <div class="form-group">    
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($product) ? $product->name : '' }}" required>
        </div>
        <div class="form-group">    
            <label for="name">Nome</label>
            <select name="category_id">
                <option value="">Selecione...</option>
                @foreach($categories as $index => $category)
                    <option value={{ $index }} {{ isset($product) && $product->category_id == $index ? 'selected' : '' }}>{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description" required>{{ isset($product) ? $product->description : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Valor</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ isset($product) ? $product->price : '' }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="price">Quantidade</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ isset($product) ? $product->quantity : '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    </div>


@endsection