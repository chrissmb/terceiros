<!DOCTYPE html>
<html>
    <head>
        <title>Página de login</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="container col-md-4">
            <div class="card">
                <h5 class="card-header">Login</h5>
                <div class="card-body">
                    <form action="auth" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" name="password"/>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit"/>
                    </form>
                    
                    @component('errors')
                    @endcomponent
                </div>
            </div>

        </div>
    </body>
</html>
