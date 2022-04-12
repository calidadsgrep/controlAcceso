<?php

require_once 'Model/Minuta.php';

class MinutasController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Minuta();
    }
    
    public function Index(){        
        require_once 'View/headers/header.php';    
        $puestos = $this->model->Puesto($_SESSION['infraestructura']);   
        require_once 'View/minuta/index.php';
        require_once 'View/footers/footer.php';        
    }
    public function Puesto()
    {
        require_once 'View/headers/header.php';    
        require_once 'View/minuta/puesto.php';
        require_once 'View/footers/footer.php';   
    }
    




}