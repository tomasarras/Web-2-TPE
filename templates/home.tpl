<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <base href='{$BASE_URL}' >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/estilos.css">

    <title>{$titulo}></title>
</head>

<body>

    <body>
        <div class="container-fluid bg-inverse fixed-top bg-dark text-center">
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
                        <div class="log nav-item btn btn-danger">
                            <img src="../images/newuser.png">
                            <a class="white">Login</a>
                        </div>
                        <div class="log nav-item btn btn-danger">
                            <img src="../images/newuser.png">
                            <a class="white">Registro</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid slider d-flex flex-column justify-content-center  aling-items-center">
            <div class="text-center text-white">
                <h3>Lorem ipsum dolor sit amet</h3>
                <h1 class="display">Lorem ipsum dolor sit amet</h1>
                <p class="lead">Lorem ipsum dolor sit amet, asdadsa</p>
            </div>
            <form action="" class="justify-content-center  form-inline">

                <div class="form-group mr-2">
                    <input type="text" placeholder="Ingrese su email">

                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-danger" value="Enviar">
                </div>
            </form>
        </div>
        <div class="blog container mb-5">
            <table>
                <thead>
                    <tr>
                        <th>Banda</th>
                        <th>Ultimo Concierto</th>
                        <th>Ultimo Disco</th>
                        <th>Completada</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
            </table>
            <div class="container">
                <form method="POST" action="agregar">
                    <h2>Formulario</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre de la banda</label>
                        <input type="text" class="form-control" name="nombre_form" placeholder="Nombre de la banda">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ultimo Concierto</label>
                        <input type="text" class="form-control" name="ultimoconcierto_form"
                            placeholder="Ultimo Concierto">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ultimo Disco</label>
                        <input type="text" class="form-control" name="ultimodisco_form" placeholder="Ultimo Disco">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="completado_form">
                        <label class="form-check-label" for="exampleCheck1">Completado</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Banda</button>
                </form>

            </div>
            <div class="col-3"></div>
        </div>
        </div>
        <footer class="container-fluid bg-dark text-white py-3 text-center">
            <p>Echo por el pibe boostramp</p>
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </body>

</html>