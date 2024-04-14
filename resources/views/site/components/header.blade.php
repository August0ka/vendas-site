<header class="p-3 text-bg-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('site.home') }}">Todas</a></li>
            @foreach($categories as $category)
            <li><a class="dropdown-item" href="{{ route('site.home', $category->id) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </li>
      </ul>

      <div class="text-end">
        @auth
        <div class="d-flex align-items-center">
          <span class="text-white me-2">Olá, {{ Auth::user()->name }}</span>
          <div>
            <a type="button" href="{{ route('site.user.orders') }}" class="btn btn-outline-light btn-sm me-2">
              <i class="bi bi-box-seam"></i>
              <span class="me-2">Meus pedidos</span>
            </a>
          </div>
          <a type="button" href="{{ route('site.logout') }}" class="btn btn-outline-light btn-sm me-2">
            <i class="bi bi-box-arrow-left me-1"></i>
            <span>Sair</span>
          </a>
        </div>

        @endauth
        @guest
        <a type="button" href="{{ route('site.login.index') }}" class="btn btn-outline-light me-2">Login</a>
        <a type="button" href="{{ route('site.register') }}" class="btn btn-warning">Registrar</a>
        @endguest
      </div>
    </div>
  </div>
</header>