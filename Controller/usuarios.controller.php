<?php

require_once 'Model/Seguridad.php';
require_once 'Model/Usuario.php';
require_once 'Model/Control.php';
require_once 'Model/Informe.php';

class UsuariosController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }
    
    public function Dashboard(){        
        require_once 'View/headers/header.php';
        $info= new Informe();
        $ip=$info->Ingreso_Personas();
        $inmuebles=$info->Cliente($_SESSION['infraestructura']);
        $seguridad = new Seguridad(); 
        $modulo= 'usuarios';
        $tipo= $_SESSION['rol'];
            $permisos= $_SESSION['permisos'];           
            $val = $seguridad->Validar($modulo, $tipo);            
            $retVal = ($val->leer == 1 ) ? require_once 'View/usuarios/dashboard.php' : require_once 'View/segurity/error.php' ;
       require_once 'View/footers/footer.php';
        
    }
    public function Personas(){        
        require_once 'View/headers/header.php';
        $seguridad = new Seguridad(); 
        $modulo= 'usuarios';
        $tipo= $_SESSION['rol'];
            $permisos= $_SESSION['permisos'];           
            $val = $seguridad->Validar($modulo, $tipo);            
            $retVal = ($val->leer == 1 ) ? require_once 'View/usuarios/personas.php' : require_once 'View/segurity/error.php' ;
        require_once 'View/footers/footer.php';
        
    }

    public function Add(){

        $alm = new Usuario();
        $seguridad = new Seguridad(); 
        require_once 'View/headers/header.php';
        $modulo= 'usuarios';
        $tipo= $_SESSION['rol'];
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
            $permisos= $_SESSION['permisos'];           
            $val = $seguridad->Validar($modulo, $tipo);            
            $retVal = ($val->crear == 1 or $val->actualizar == 1 ) ? require_once 'View/usuarios/add.php' : require_once 'View/segurity/error.php' ;
        require_once 'View/footers/footer.php';
    }


    public function Add_ingreso(){
        $alm = new Usuario();
        $seguridad = new Seguridad(); 
        require_once 'View/headers/header.php';
        $modulo= 'usuarios';
        $tipo= $_SESSION['rol'];
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
            $permisos= $_SESSION['permisos'];           
            $val = $seguridad->Validar($modulo, $tipo);            
            $retVal = ($val->crear == 1) ? require_once 'View/usuarios/add_ingreso.php' : require_once 'View/segurity/error.php' ;
        require_once 'View/footers/footer.php';
    }



    public function Guardar_foto(){
    $foto=  $this->model->Foto();        
      }
 

 public function Registrar(){
     $alm =  new Usuario();

     $dia=date('Y-m-d');
     $alm->id=$_REQUEST['id'];
     $alm->tipo_identificacion=$_REQUEST['tipo_identificacion'];
     $alm->num_identificacion=$_REQUEST['num_identificacion'];
     $alm->nombres=$_REQUEST['nombres'];
     $alm->apellidos=$_REQUEST['apellidos'];
     $alm->telefono=$_REQUEST['telefono'];
     $alm->direccion=$_REQUEST['direccion'];
     $alm->correo=$_REQUEST['correo'];
     $alm->fnacimiento=$_REQUEST['fnacimiento'];
     $alm->genero=$_REQUEST['genero'];
     $alm->tsangre=$_REQUEST['tsangre'];
     $alm->alergias=$_REQUEST['alergias'];
     $alm->mreducida=$_REQUEST['mreducida'];
     $alm->foto=$_REQUEST['foto'];
     $alm->tipo_usuario= $_REQUEST['tipo_usuario'];
     $alm->created=$dia;
     $alm->modified= $dia;
     $alm->estado= 1; 
     $alm->infraestructura_id=$_REQUEST['infraestructura_id'];
     $alm->username= $_REQUEST['num_identificacion'];
     $alm->password= md5($_REQUEST['num_identificacion']);
     session_start();
     $_SESSION['identidad']=$alm->num_identificacion;
        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
}

public function Ver(){

    $seguridad = new Seguridad(); 
    
        require_once 'View/headers/header.php';
        $modulo= 'usuarios';
        $tipo= $_SESSION['rol'];
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
            $permisos= $_SESSION['permisos'];           
            $val = $seguridad->Validar($modulo, $tipo);            
            $retVal = ($val->leer == 1) ? require_once 'View/usuarios/ver.php' : require_once 'View/segurity/error.php' ;
        require_once 'View/footers/footer.php';
    
}
   


}

