<?php

require_once 'Model/Correspondencia.php';

class CorrespondenciasController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Correspondencia();
    }
    
    
    public function index(){
        $correpondencias= $this->model->Index();
        
        require_once 'View/headers/header.php';
        require_once 'View/correspondencia/index.php';
        require_once 'View/footers/footer.php';             
	}

	public function add(){
        session_start();
        $corres= new Correspondencia;
        $destinos= $this->model->Destinos($_SESSION['infraestructura']);

        if(isset($_REQUEST['id'])){                 
        $corres = $this->model->View($_REQUEST['id']);
        $residentes= $this->model->Residentes($corres->destino);
         }
        require_once 'View/correspondencia/add.php';
        
		
	}
	public function View(){
        $corres = $this->model->View($_REQUEST['id']);
        $residentes= $this->model->Residentes($corres->destino);
        
        require_once 'View/correspondencia/view.php';	
	}

	public function crud(){
		$obj = new Correspondencia();    
        
        $obj->id=$_REQUEST['id'];
        $obj->guarda_recibe=$_REQUEST['guarda_recibe'];
        $obj->fecha_llegada=$_REQUEST['fecha_llegada'];
        $obj->tipo_correspondencia=$_REQUEST['tipo_correspondencia'];
        $obj->destino=$_REQUEST['destino'];

        $obj->fecha_entrega=$_REQUEST['fecha_entrega'];
        $obj->guarda_entrega=$_REQUEST['guarda_entrega'];
        $obj->residente_recibe=$_REQUEST['residente_recibe'];

        $obj->id > 0 
        ? $this->model->Actualizar($obj)
        : $this->model->Registrar($obj);

	}
    
}