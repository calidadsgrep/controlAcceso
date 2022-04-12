<?php

require_once 'Model/Condominio.php';
require_once 'Model/Tipoinfra.php';

class CondominiosController{
    
    private $model;
        
    public function __CONSTRUCT(){
        $this->model = new Condominio();
       
    }
    
    public function Dashboard(){    
        $seguridad = new Seguridad(); 
         require_once 'View/headers/header.php';
            $modulo= 'infraestructura';
            $tipo= $_SESSION['rol'];
            $permisos= $_SESSION['permisos'];           
            $val = $seguridad->Validar($modulo, $tipo);            
            $retVal = ($val->leer == 1 ) ? require_once 'View/condominios/index.php' : require_once 'View/segurity/error.php' ;
         require_once 'View/footers/footer.php';
        
    }

    public function Crud(){ 
        //permiso id= 2
        $alm = new Condominio(); 
        $seguridad = new Seguridad(); 
        session_start();        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        $modulo= 'infraestructura';
        $tipo= $_SESSION['rol'];
        $permisos= $_SESSION['permisos'];
        //print_r($permisos);
        $val = $seguridad->Validar($modulo, $tipo);        
        $retVal = ($val->crear == 1 ) ? require_once 'View/condominios/crud.php' : require_once 'View/segurity/error.php' ;
    }  

    public function Add(){    
        $alm = new Condominio();
        $alm->id = $_REQUEST['id'];    
        $alm->nit = $_POST['nit'];
        $alm->nombre = $_REQUEST['nombre'];
        $alm->direccion = $_REQUEST['direccion'];
        $alm->telefono = $_REQUEST['telefono'];
        $alm->barrio = $_REQUEST['barrio'];
        $alm->ciudad = $_REQUEST['ciudad'];
        $alm->tipo_infraestrura = $_REQUEST['tipo_infraestrura'];
       // $alm->celular = $_REQUEST['celular'];
        $alm->administrador = $_REQUEST['admin'];
        $alm->num_inmueble = $_REQUEST['num_inmue'];
        //$alm->area = $_REQUEST['area'];
        //$alm->fecha = $_REQUEST['fecha'];
        $alm->creacion = $_REQUEST['creacion'];
        $alm->actualizacion = $_REQUEST['actualizacion'];
         
  
        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);

    }


}