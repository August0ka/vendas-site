@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{{ isset($product) ? 'Editando Produto' : 'Adicionando Produto' }}</h1>
    <form action="{{ isset($product) ? route('products.update', [$product->id]) : route('products.store') }}" enctype="multipart/form-data" method="POST">

        @if(isset($product))
            @method('PUT')
        @endif

        @csrf
        <div class="form-group">    
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($product) ? $product->name : '' }}" required>
        </div>
        <div class="form-group">    
            <label for="name">Categoria</label>
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
            <label for="quantity">Quantidade</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ isset($product) ? $product->quantity : '' }}" required>
        </div>
        <div class="mb-3">
            <label for="main_image" class="form-label">Imagem principal</label>
            <input class="form-control" name="main_image" type="file" id="main_image">
            @if(isset($product))
                <div class="mt-2 mb-2">
                    <img src="{{ asset('storage/images/' . $product->main_image) }}" alt="Imagem" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="multiple_images" class="form-label">Imagens</label>
            <input class="form-control" name="multiple_images[]" type="file" id="multiple_images" multiple>
            @if(isset($product) && $productImages)
                <div class="mt-2 mb-2">
                    @foreach($productImages as $image)
                        <img src="{{ asset('storage/images/' . $image) }}" alt="Imagem" class="d-inline-block mr-2" style="width: 100px; height: 100px; object-fit: cover;">
                    @endforeach 
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    </div>


@endsection
<!-- @section('scripts')
    <script>

    function previewImage(event) {
        let output = document.getElementById('output');
        console.log(event.target);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };

    </script>

@endsection -->