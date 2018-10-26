<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titulo')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>

        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/">Incio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/empresa">Empresa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/colaborador">Colaborador</a>
          </li>
        </ul>

        <div class="container">
            @yield('conteudo')
        </div>
    </body>
</html>
