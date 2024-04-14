<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Registro</title>
</head>
<body class="bg-body-secondary">
  <div class="container-fluid h-100 py-5 justify-content-center  align-content-center">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header text-center">
           <h4>Registrar</h4> 
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('site.register.store') }}">
              @csrf
              <div class="row">

                <div class="form-group mb-3 col-6">
                  <label for="name">Nome</label>
                  <input id="name" type="text" class="form-control" name="name" required autofocus>
                </div>
  
                <div class="form-group mb-3 col-6">
                  <label for="cpf">CPF</label>
                  <input id="cpf" type="text" class="form-control" name="cpf" required autofocus>
                </div>
              </div>

              <div class="row">

                <div class="form-group mb-3 col-6">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" required>
                </div>
  
                <div class="form-group mb-3 col-6">
                  <label for="password">Senha</label>
                  <input id="password" type="password" class="form-control" name="password" required>
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="address">Endereço</label>
                <input id="address" type="text" class="form-control" name="address" required>
              </div>

              <div class="row">
                <div class="form-group mb-3 col-8">
                  <label for="city">Cidade</label>
                  <input id="city" type="text" class="form-control" name="city" required>
                </div>

                <div class="form-group mb-3 col-4">
                  <label for="state">Estado</label>
                  <input id="state" type="text" class="form-control" name="state" placeholder="Mato Grosso" required>
                </div>
  
              </div>

              <div class="row text-end">
                <div>
                  <button type="submit" class="btn btn-primary">Registrar</button>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
    })
</script>
</html>
