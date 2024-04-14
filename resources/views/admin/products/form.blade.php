@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
    <div class="d-flex align-content-center  ">
        <a href="{{ url()->previous() }}" class="btn" style="background: none; border: none; padding: 0; display: inline-flex; align-items: center;">
            <i class="bi bi-arrow-left-circle me-3" style="font-size: 25px;"></i>
        </a>
        <h3>{{ isset($product) ? 'Editando Produto' : 'Adicionando Produto' }}</h3>
    </div>
    <form action="{{ isset($product) ? route('products.update', [$product->id]) : route('products.store') }}" enctype="multipart/form-data" method="POST">

        @if(isset($product))
            @method('PUT')
        @endif

        @csrf
        <div class="form-group mt-4">    
            <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($product) ? $product->name : '' }}" required>
                </div>
                <div class="col-4">
                    <label for="name" class="form-label">Categoria</label>
                    <select class="form-select" name="category_id">
                        <option value="">Selecione...</option>
                        @foreach($categories as $index => $category)
                            <option value={{ $index }} {{ isset($product) && $product->category_id == $index ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" rows=6 name="description" required>{{ isset($product) ? $product->description : '' }}</textarea>
                </div>     
                <div class="col-5">      
                    <label for="main_image" class="form-label">Imagem principal</label>
                    <input class="form-control" name="main_image" type="file" id="main_image">
                    @if(isset($product))
                        <div class="mt-2 mb-2">
                            <img src="{{ asset('storage/images/' . $product->main_image) }}" alt="Imagem" style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                    @endif
                </div> 
            </div>
            <div class="row mt-2">
                <div class="col-2">
                    <label for="price" class="form-label">Valor</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ isset($product) ? $product->price : '' }}" step="0.01" required>
                </div>      
                <div class="col-2">
                    <label for="quantity" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ isset($product) ? $product->quantity : '' }}" required>
                </div>      
        </div>

        <div class="row">
            <div class="col-11">
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
        </div>

        <div class="row text-end">
            <div>
                <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </div>
    </form>
    </div>


@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#price').mask("#.##0,00", {reverse: true});
    })
</script>

@endsection
