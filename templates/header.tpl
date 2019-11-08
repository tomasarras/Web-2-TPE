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
    <script src="js/vue.js"></script>
    <script src="js/script.js"></script>

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
                {if $logueado}
                    <a class="nav-item nav-link active" href="admin">Administrar</a>

                    <a href="logout">
                        <div class="log nav-item btn btn-danger">
                            <img src="images/newuser.png">
                            Cerrar sesión
                        </div>
                    </a>

                {else}
                    <a href="login">
                        <div class="log nav-item btn btn-danger">
                            <img src="images/lock.png">
                            Login
                        </div>
                    </a>
                    <a href="NuevoUsuario">
                        <div class="log nav-item btn btn-danger">
                            <img src="images/newuser.png">
                            Registro
                        </div>
                    </a>
                {/if}
            </div>
        </div>
    </nav>
</header>