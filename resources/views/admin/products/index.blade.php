@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="mt-5">
        <h3>Produtos</h1>
    </div>
    
    <div class="mt-2 mb-2 d-flex justify-content-end ">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Novo Produto</a>
    </div> 

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive shadow card rounded-3 p-0 m-0 mt-5">
        <table class="table table-bordered rounded-3 border overflow-hidden p-0 m-0">
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
                    <td>{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm"
                        data-bs-toggle="tooltip" 
                        data-bs-placement="top" 
                        data-bs-title="Editar produto">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        
                        <button type="button" class="btn btn-danger btn-sm delete-button"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top" 
                            data-bs-title="Excluir produto"
                            data-button-modal="{{$product->id}}">
                            <i class="bi bi-trash3"></i>        
                        </button>
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