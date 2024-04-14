<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-body-secondary">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center align-items-center w-50">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <img class="img-fluid" src="{{ asset('chocoVersusFundo.png') }}" alt="ChocoVersus.png" width="100" height="100">
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.auth') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('login_errors') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="password" class="form-label">Senha</label>
                                <input id="password" type="password" class="form-control @error('login_errors') is-invalid @enderror" name="password" required>
                                @if($errors->has('login_errors'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$errors->first('login_errors')}}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>

</html>