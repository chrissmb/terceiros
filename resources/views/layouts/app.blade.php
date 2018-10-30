<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titulo')</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>

        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/">Incio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/empresas">Empresas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/colaboradores">Colaboradores</a>
          </li>
        </ul>
        
        <div class="container">
            @yield('conteudo')
        </div>
    </body>
</html>
