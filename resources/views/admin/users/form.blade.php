@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
    <div class="d-flex align-content-center  ">
        <a href="{{ url()->previous() }}" class="btn" style="background: none; border: none; padding: 0; display: inline-flex; align-items: center;">
            <i class="bi bi-arrow-left-circle me-3" style="font-size: 25px;"></i>
        </a>
        <h3>{{ isset($user) ? 'Editando Usuário' : 'Adicionando Usuário' }}</h3>
    </div>
    <form action="{{ isset($user) ? route('users.update', [$user->id]) : route('users.store') }}" enctype="multipart/form-data" method="POST">

        @if(isset($user))
            @method('PUT')
        @endif

        @csrf
        <div class="form-group mt-4">
            <div class="row">
                <div class="col-7">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}" required>
                </div>
                <div class="col-5">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ isset($user) ? $user->cpf : '' }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}" required>
                </div>
                <div class="col-4">
                    <label for="password">Senha</label>
                    <input type="text" class="form-control" id="password" name="password" {{isset($user) ? '' : 'required'}}>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label for="address">Endereço</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ isset($user) ? $user->address : '' }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ isset($user) ? $user->city : '' }}" required>
                </div>
                <div class="col-6">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control" id="state" name="state" value="{{ isset($user) ? $user->state : '' }}" required>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>
    </div>


@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
    })
</script>

@endsection