<?php

require_once "index.php";
require_once "tareas.php";


$partesUrl = explode('/', $_GET ['action']);
if($partesUrl [0] == ''){
    home();
}else{
    if($partesUrl [0]  == 'agregar'){
        insertTareas();
}elseif($partesUrl[0] == 'borrar') {
    Borrartares($partesUrl[1]);
}
}
