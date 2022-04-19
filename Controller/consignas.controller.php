<?php

require_once 'Model/Consigna.php';

class ConsignasController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Consigna();
    }
    
    public function Index(){
        
        require_once 'View/headers/header.php';
        $cons=$this->model->Listar();
        require_once 'View/consigna/index.php';
        require_once 'View/footers/footer.php';
        
    }
    public function Add(){

        
        $infras=$this->model->Infraestrutura();
        require_once 'View/consigna/add.php';
        
        
        
    }
    public function Personas(){
        $personas=$this->model->Personas($_REQUEST['id']);
        require_once 'View/consigna/personas.php';
    }

    public function Crud(){
         $cons= new Consigna;
        @$cons->id=$_REQUEST['id'];
         $cons->consigna=$_REQUEST['consigna'];
         $cons->infraestructura_id=$_REQUEST['infraestructura_id'];
         $cons->fecha_reg=date('Y-m-d');
         $cons->dirigido_a=$_REQUEST['dirigido_a'];
         $cons->duracion=$_REQUEST['duracion'];

         $cons->id > 0 
            ? $this->model->Actualizar($cons)
            : $this->model->Registrar($cons);
         

    }




}