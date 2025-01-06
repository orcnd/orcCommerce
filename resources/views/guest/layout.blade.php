<!doctype html>
<html lang="{{app()->getLocale()}}"
@if (app()->getLocale() === 'ar')
 dir="rtl"
@endif
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carattere&family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link href="{{Vite::asset('resources/css/app.css')}}"  rel="stylesheet">
</head>
<body class="krub-font">
    <div class="container" id="top-menu">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-2">
            <div class="col-md-3 mb-2 mb-md-0">
                @include('shared.mainNavbarLanguageMenu')
            </div>
            <a href="/" id="main-logo" class="col-md-auto mb-2 justify-content-center mb-md-0 carattere-font">
                Şeref Nalçacıgil
            </a>
            <div class="col-md-3 text-end">
                <a href="{{route('login')}}" class="top-link">
                    <span class="material-symbols-sharp">person</span>
                </a>

                <a href="#" class="top-link">
                    <span class="material-symbols-sharp">share_location</span>
                </a>
            </div>
        </div>
    </div>
    <div class="navbar navbar-expand-lg" id="main-menu-container">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-menu">
                <ul class="navbar-nav text-dark mx-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link linkEffect linkEffect--insideOut" aria-current="page" href="#">Yüzük</a>
                        <div class="menu-dropdown">
                            <div>
                                <div class="container">
                                    wqewqewqe
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkEffect linkEffect--insideOut" aria-current="page" href="#">Kolye</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkEffect linkEffect--insideOut" aria-current="page" href="#">Bileklik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkEffect linkEffect--insideOut" aria-current="page" href="#">Küpe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkEffect linkEffect--insideOut" aria-current="page" href="#">Zincir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkEffect linkEffect--insideOut" aria-current="page" href="#">Alyans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkEffect linkEffect--insideOut" aria-current="page" href="#">Setler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linkEffect linkEffect--insideOut" aria-current="page" href="#">Pırlanta</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#searchModal" >
                            <span class="material-symbols-sharp font-lighter fs-4">
                                search
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



        <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Search')}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{__('Close')}}"></button>
                </div>
                <div class="modal-body">
                    <input type="search" class="form-control" placeholder="{{__('Search')}}..." aria-label="{{__('Search')}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                    <button type="button" class="btn btn-primary">{{__('Search')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
