<?php 
class AuthHelper {

    // verifica si paso 30 minutos desde el ultimo request y devuelve si esta logueado o no
    function isLoged() { 
        session_start();
        
        if ( isset($_SESSION["id_usuario"]) ) {

            if ( isset($_SESSION['LAST_ACTIVITY']) && 
            (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) { 
                session_destroy(); // destruye la sesión, y vuelve al login
            }
            
            $_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
            return true;
        } else {
            return false;
        }
        
    }

    //verifica si esta logueado, si no esta, lo redirige a login
    function verificarPermiso() { 
        session_start();
        
        if ( isset($_SESSION["id_usuario"]) ) {

            if ( isset($_SESSION['LAST_ACTIVITY']) && 
            (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) { 
                session_destroy(); // destruye la sesión, y vuelve al login
                header("Location: ". LOGIN);
                die();
            }
            
            $_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
        } else {
            header("Location: ". LOGIN);
            die();
        }

    }
    
}
?>