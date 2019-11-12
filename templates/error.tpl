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
    <script src="js/script.js"></script>

    <title>{$titulo}</title>
</head>
<body>

<div class="view">

    <div class="face err">
        <div class="band err">
            <div class="red err"></div>
            <div class="white err"></div>
            <div class="blue err"></div>
        </div>
        <div class="eyes err"></div>
        <div class="dimples err"></div>
        <div class="mouth err"></div>
    </div>

    <h1 class="error-404 err">Oops! algo salio mal!</h1>
    <h1 class="error-404 err">{$mensaje}</h1>

    <div class="centrar-contenido">
        <a class="btn btn-primary err" href="{$home}">Volver al Home</a>
    </div>
</div>

{include file="footer.tpl"}