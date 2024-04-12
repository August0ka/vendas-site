@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="mt-5">
        <h3>Vendas</h1>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive card rounded-3 p-0 m-0 mt-5">
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
                @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->name }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>
                    <a href="{{ route('products.edit', $sale->id) }}" class="btn btn-info btn-sm"
                        data-bs-toggle="tooltip" 
                        data-bs-placement="top" 
                        data-bs-title="Editar produto">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        
                        <button type="button" class="btn btn-danger btn-sm delete-button"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top" 
                            data-bs-title="Excluir produto"
                            data-button-modal="{{$sale->id}}">
                            <i class="bi bi-trash3"></i>        
                        </button>
                    </td>
                </tr>
                <!-- Delete Product Modal -->
                <div class="modal fade" id="deleteModal{{$sale->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <form action="{{ route('products.destroy', $sale->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Excluir produto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Deseja remover <strong>{{ $sale->name }}</strong> ?</p>
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
            let saleId = $(this).data('button-modal');
            
            $(`#deleteModal${saleId}`).modal('show');
        });
    });
</script>
@endsection