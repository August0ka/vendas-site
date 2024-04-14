<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
      document.documentElement.setAttribute('data-bs-theme', localStorage.getItem('theme') || 'dark');
    </script>
    <title>Choco Admin</title>
</head>

<body class="bg-body-secondary"> 
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 shadow d-md-block sidebar collapse h-full">
                <div class="position-sticky d-flex flex-column">
                    <ul class="nav flex-column mt-5 mb-4">
                        <li class="nav-item">
                            <div class="col-auto text-start">
                                <button class="btn btn-dark shadow" id="btnSwitch">
                                    <i class="bi bi-moon-stars" id="themeIcon"></i>
                                </button>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-auto mb-2">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-people"></i>
                                    <a class="nav-link active text-black sidebarItem" aria-current="page" href="{{route('users.index')}}">
                                        Usuários
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-shop"></i>
                                    <a class="nav-link text-black sidebarItem" href="{{route('products.index')}}">
                                        Produtos
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-tags"></i>
                                <a class="nav-link text-black sidebarItem" href="{{route('categories.index')}}">
                                    Categorias
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-cash-coin"></i>
                                    <a class="nav-link text-black sidebarItem" href="{{route('sales.index')}}">
                                        Vendas
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-box-arrow-left"></i>
                                    <a class="nav-link text-black sidebarItem" href="{{ route('admin.logout') }}">
                                        Sair
                                    </a>
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  $(document).ready(function() {
    let storedTheme = localStorage.getItem('theme') || 'dark';
    localStorage.setItem('theme', storedTheme);

    if (storedTheme === 'light') {
        applyLightTheme();
    } else {
        applyDarkTheme();
    }

    $('#btnSwitch').click(function() {
        let currentTheme = $('html').attr('data-bs-theme');
        if (currentTheme === 'dark') {
            applyLightTheme();
            localStorage.setItem('theme', 'light');
        } else {
            applyDarkTheme();
            localStorage.setItem('theme', 'dark');
        }
    });

    function applyLightTheme() {
        $('#themeIcon').removeClass('bi-brightness-high').addClass('bi-moon-stars');
        $('#btnSwitch').removeClass('btn-light').addClass('btn-dark');
        $('#sidebarMenu').removeClass('bg-dark').addClass('bg-light');
        $('.sidebarItem').removeClass('text-white').addClass('text-black');
        $('html').attr('data-bs-theme', 'light');
    }

    function applyDarkTheme() {
        $('#themeIcon').removeClass('bi-moon-stars').addClass('bi-brightness-high');
        $('#btnSwitch').removeClass('btn-dark').addClass('btn-light');
        $('#sidebarMenu').removeClass('bg-light').addClass('bg-dark');
        $('.sidebarItem').removeClass('text-black').addClass('text-white');
        $('html').attr('data-bs-theme', 'dark');
    }
});

</script>

@yield('scripts')
</html>