<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Fontawsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    {{-- JqueryInputMask --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Select2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/pt-BR.min.js"
        integrity="sha512-H1yBoUnrE7X+NeWpeZvBuy2RvrbvLEAEjX/Mu8L2ggUBja62g1z49fAboGidE5YEQyIVMCWJC9krY4/KEqkgag=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<header>
    <main>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('patients.index') }}">Pacientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('counties.index') }}">Municípios</a>
                        </li>
                    </ul>
                    <form action="{{ request()->route()->uri }}" method="GET" class="d-flex" role="search">
                        @csrf
                        <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </main>
</header>


<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('.phone').mask('(00)00000-0000');
            $('.cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('.cns').mask('000.000.000.000.000', {
                reverse: true
            });
            $('.form-select').select2({
                placeholder: 'Selecione uma opção',
                allowClear: true,
                language: 'pt-BR',
                theme: 'bootstrap-5'
            });
        });
    </script>

    @yield('js')


</body>

</html>
