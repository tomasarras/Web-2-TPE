<header class="container-fluid bg-inverse fixed-top bg-dark text-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark container">
        <a class="navbar-brand" href="#">La Maquina del Metal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="#">Inicio <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="registro.html">Contacto</a>
                <a class="nav-item nav-link active" href="#">Bandas</a>
                {if $logueado}
                <a class="nav-item nav-link active" href="admin">Administrar</a>
                
                    <div class="log nav-item btn btn-danger">
                        <img src="images/newuser.png">
                        <a class="white btn-login" href="logout">Cerrar sesión</a>
                    </div>
                {else}
                    <div class="log nav-item btn btn-danger">
                        <img src="images/newuser.png">
                        <a class="white btn-login" href="login">Login</a>
                    </div>
                    <div class="log nav-item btn btn-danger">
                        <img src="images/newuser.png">
                        <a class="white btn-login" href="NuevoUsuario">Registro</a>
                    </div>
                {/if}
            </div>
        </div>
    </nav>
</header>