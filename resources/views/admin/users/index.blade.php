@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="mt-5">
        <h3>Usuários</h1>
    </div>
    <div class="mt-2 mb-2 d-flex justify-content-end ">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Novo Usuário</a>
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
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td style="white-space: nowrap;">{{ $user->cpf }}</td>
                    <td>{{ $user->state }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->address }}</td>
                    <td style="white-space: nowrap;">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm"
                            data-bs-toggle="tooltip" 
                            data-bs-placement="top" 
                            data-bs-title="Editar usuário">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        
                        <button type="button" class="btn btn-danger btn-sm delete-button"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top" 
                            data-bs-title="Excluir usuário"
                            data-button-modal="{{$user->id}}">
                            <i class="bi bi-trash3"></i>        
                        </button>
                    </td>
                </tr>
                <!-- Delete user Modal -->
                <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Excluir Usuário</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Deseja remover <strong>{{ $user->name }}</strong> ?</p>
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
            let userId = $(this).data('button-modal');
            
            $(`#deleteModal${userId}`).modal('show');
        });
    });
</script>
@endsection