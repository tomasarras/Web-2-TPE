<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{$home}">
   

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon"  href="images/favicon.png">
    <script src="https://kit.fontawesome.com/a349ac397c.js" crossorigin="anonymous"></script>
    <script src="js/Vue.js"></script>
    <script type="module" src="js/script.js"></script>
    <title>{$titulo}</title>
</head>
<body>

<header class="container-fluid bg-inverse fixed-top bg-dark text-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark container">
        <a class="navbar-brand titulo" href="#">La Maquina del Metal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ml-auto">

                <a class="nav-item nav-link active" href="#">Inicio</a>


                {if $user->logueado}
                    <input class="none" id="user-admin" value="{{$user->admin}}">
                    <input class="none" id="user-logueado" value="{{$user->logueado}}">
                    <input class="none" id="user-email" value="{{$user->email}}">
                    <input class="none" id="user-nombre" value="{{$user->nombre}}">
                    <input class="none" id="user-id" value="{{$user->id_usuario}}">
                
                    {if $user->admin}
                    <a class="nav-item nav-link active" href="admin">Administrar</a>
                    {/if}

                    <a href="logout">
                        <div class="log nav-item btn btn-danger" id="logout">
                            <img src="images/newuser.png">
                            Cerrar sesión
                        </div>
                    </a>

                {else}
                    <input class="none" id="user-admin" value="0">
                    <input class="none" id="user-logueado" value="0">
                    <input class="none" id="user-email" value="">
                    <input class="none" id="user-nombre" value="">
                    <input class="none" id="user-id" value="">

                    <a href="login">
                        <div class="log nav-item btn btn-danger">
                            <img src="images/lock.png">
                            Login
                        </div>
                    </a>
                    <a href="registrarse">
                        <div class="log nav-item btn btn-danger cd-signup">
                            <img src="images/newuser.png">
                            Registro
                        </div>
                    </a>
                {/if}
            </div>
        </div>
    </nav>
</header>