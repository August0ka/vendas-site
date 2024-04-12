@extends('site.layouts.app')

@section('site_content')
<div class="container-fluid mt-5">
        <div class="row">
            <div class="col-7">
                <div class="card mb-3">
                    <div class="card-header">
                        Endereço de entrega
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $user->address }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Informações do Produto
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Informações do Produto
                        </div>
                        <div class="card-body">
                            <p class="card-text">Nome do Produto: {{ $product->name }}</p>
                            <p class="card-text">Descrição: {{ $product->description }}</p>
                            <form method="POST">
                                @csrf
                                <div class="mb-2 d-flex align-items-center">
                                    <label for="quantity" class="form-label me-2">Quantidade:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control text-center" style="width: 60px;" value="1" min="1">
                                </div>
                            </form>
                            <p class="card-text">Preço unitário: R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="card h-100">
                    <div class="card-header">
                        Resumo do Pedido
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Detalhes do Pedido</h5>
                        <p class="card-text">Produto: {{ $product->name }}</p>
                        <p class="card-text">Quantidade: 1</p>
                        <p class="card-text">Total: {{ $product->price }}</p>
                        <button type="button" class="btn btn-primary">Finalizar Compra</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection