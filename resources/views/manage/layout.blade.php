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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item"><a href="{{route('manage.home')}}" class="nav-link px-2 link-secondary">{{__('Home')}}</a></li>                   
                        <li class="nav-item"><a href="{{route('manage.category.index')}}" class="nav-link px-2 link-secondary">{{__('Categories')}}</a></li>                   
                    </ul>

                    @include('shared.mainNavbarLanguageMenu')
                    @include('shared.mainNavbarUserMenu')
                </div>
            </div>
            <div class="col py-3">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
