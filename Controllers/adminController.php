<?php 
require_once "./Views/adminView.php";
require_once "AuthHelper.php";

class AdminController {

    private $adminView;
    private $authHelper;
    private $logueado;
    private $bandasModel;

    function __construct() {
        $this->adminView = new AdminView();
        $this->authHelper = new AuthHelper();
        $this->bandasModel = new BandasModel();
    }

    function getAdmin() {
        $logueado = $this->authHelper->isLoged();
    
        if ( $logueado ) {
          $this->adminView->mostrarAdmin("Administrar",$logueado);
        } else {
          header("Location: ". LOGIN);
          die();
        }
    }

    function getBandas(){
        $logueado = $this->authHelper->isLoged();
        $bandas = $this->bandasModel->GetBandas();

        if ( $logueado ) {
            $this->adminView->mostrarBandas("Administrar bandas",$logueado,$bandas);
        } else {
            header("Location: ". LOGIN);
            die();
        }
    }
 

}


?>