<?php

require_once 'Model/Informe.php';

class InformesController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Informe();
    }
    
    public function Personas(){   
        $persona=$this->model->Ingreso_Personas();            
        require_once 'View/informe/personas.php';          
    }
}