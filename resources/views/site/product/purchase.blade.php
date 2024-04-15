@extends('site.layouts.app')

@section('site_content')
<div class="container mt-5 justify-content-center">
    <div class="row">
        <div class="col-7">
            <div class="card shadow mb-3">
                <div class="card-header">
                    Endereço de entrega
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $user->address }}</p>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    Informações do Produto
                </div>
                <div class="card-body">
                    <p class="card-text">Nome do Produto: {{ $product->name }}</p>
                    <p class="card-text">Descrição: {{ $product->description }}</p>
                    <div class="mb-2 d-flex align-items-center">
                        <label for="infoQuantity" class="form-label me-2">Quantidade:</label>
                        <input type="number" id="infoQuantity" class="form-control text-center me-2" style="width: 60px;" value="1" min="1">
                        @if($errors->has('error'))
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $errors->first('error') }}</strong>
                            </span>
                        @endif
                    </div>
                    <p class="card-text">Preço unitário: R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="col-5">
            <div class="card h-100 shadow">
                <div class="card-header">
                    Resumo do Pedido
                </div>
                <div class="card-body">
                    <h5 class="card-title">Detalhes do Pedido</h5>
                    <p class="card-text">Produto: {{ $product->name }}</p>
                    <p class="card-text" id="summaryQuantity">Quantidade: 1</p>
                    <p class="card-text" id="totalValue">Total: {{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</p>
                    <form action="{{route('site.purchase.store', $product->id)}}" method="POST">
                        @csrf
                        <input type="hidden" id="hiddenQuantity" name="quantity" value="1">
                        <input type="hidden" id="hiddenTotal" name="total" value="{{ $product->price }}">
                        <button type="submit" class="btn btn-primary">Finalizar Compra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('site_scripts')
<script>
    $(document).ready(function() {
        $('#infoQuantity').on('change', function() {
            let price = '{{ $product->price }}';
            let quantity = $(this).val();
            let total = quantity * price;

            $('#totalValue').text('Total: R$ ' + total.toFixed(2).replace('.', ','));
            $('#summaryQuantity').text('Quantidade: ' + quantity);
            $('#hiddenQuantity').val(quantity);
            $('#hiddenTotal').val('R$' + total.toFixed(2).replace('.', ','));
        });
    });
</script>
@endsection