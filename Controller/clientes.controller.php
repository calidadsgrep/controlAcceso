<?php

require_once 'Model/Seguridad.php';

class CondominiosController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Seguridad();
    }
    
    public function Dashboard(){
        
        require_once 'View/headers/header.php';
        require_once 'View/usuarios/dashboard.php';
        require_once 'View/footers/footer.php';
        
    }
}