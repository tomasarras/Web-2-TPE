<?php 
class AuthHelper {

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
    
}
?>