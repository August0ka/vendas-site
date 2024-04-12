@extends('admin.layouts.app')

@section('content')
    <div class="container">
    <h1>{{ isset($user) ? 'Editando Usuário' : 'Adicionando Usuário' }}</h1>
    <form action="{{ isset($user) ? route('users.update', [$user->id]) : route('users.store') }}" enctype="multipart/form-data" method="POST">

        @if(isset($user))
            @method('PUT')
        @endif

        @csrf
        <div class="form-group">    
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}" required>
        </div>
        <div class="form-group">    
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}" required>
        </div>
        <div class="form-group">    
            <label for="password">Senha</label>
            <input type="text" class="form-control" id="password" name="password" {{isset($user) ? '' : 'required'}}>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ isset($user) ? $user->cpf : '' }}" required>
        </div>
        <div class="form-group">
            <label for="state">Estado</label>
            <input type="text" class="form-control" id="state" name="state" value="{{ isset($user) ? $user->state : '' }}" required>
        </div>
        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ isset($user) ? $user->city : '' }}" required>
        </div>
        <div class="form-group">
            <label for="address">Endereço</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ isset($user) ? $user->address : '' }}" required>
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