<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Nome site</title>
</head>

<body class="bg-body-secondary"> 
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse h-full">
                <div class="position-sticky d-flex flex-column">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-black" aria-current="page" href="{{route('users.index')}}">
                                Usuários
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{route('products.index')}}">
                                Produtos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{route('categories.index')}}">
                                Categorias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{route('sales.index')}}">
                                Vendas
                            </a>
                        </li>
                    </ul>
                    <div class="mt-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{ route('admin.logout') }}">
                                    Sair
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>

@yield('scripts')
</html>