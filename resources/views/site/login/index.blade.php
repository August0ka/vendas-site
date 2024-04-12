<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Login</title>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{ route('site.login.auth') }}" method="POST">
          @csrf
          <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
          </div>

          <div data-mdb-input-init class="form-outline mb-3">
            <label class="form-label" for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control form-control-lg"
              placeholder="Enter password" />
          </div>

          <div class="d-flex justify-content-end align-items-center">
            <a href="#!" class="text-body">Esqueceu sua senha ?</a>
          </div>

          <div class="text-center text-lg-center mt-4 pt-2">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Não tem uma conta? <a href="{{ route('site.register') }}" target="_
                class="link-danger">Registrar</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>