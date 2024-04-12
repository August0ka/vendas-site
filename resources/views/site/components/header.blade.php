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
        <li><a href="#" class="nav-link px-2 text-white">Sobre nós</a></li>
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
      </form>

      <div class="text-end">
      @auth
        <span class="text-white">Olá, {{ Auth::user()->name }}</span>
        <a type="button" href="{{ route('site.logout') }}" class="btn btn-outline-light me-2">Sair</a>
      @endauth
      @guest
        <a type="button" href="{{ route('site.login.index') }}" class="btn btn-outline-light me-2">Login</a>
        <a type="button" href="{{ route('site.register') }}" class="btn btn-warning">Registrar</a>
      @endguest
      </div>
    </div>
  </div>
</header>