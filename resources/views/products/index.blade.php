@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produtos</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary">Novo Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                    
                    <button type="button" class="btn btn-danger delete-button"
                        data-button-modal="{{$product->id}}">Excluir</button>
                </td>
            </tr>
            <!-- Delete Product Modal -->
            <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Excluir produto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Deseja remover <strong>{{ $product->name }}</strong> ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                                <button type="submit" class="btn btn-success">Sim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.delete-button').on('click', function () {
            let productId = $(this).data('button-modal');
            
            $(`#deleteModal${productId}`).modal('show');
        });
    });
</script>
@endsection