<?php
require_once 'Model/Inmueble.php';
require_once 'Model/Seguridad.php';
class InmueblesController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Inmueble();
    }

    public function Dashboard()
    {
           
        require_once 'View/headers/header.php';
        $seguridad = new Seguridad(); 
            $modulo= 'inmueble';
            $tipo= $_SESSION['rol'];
            $permisos= $_SESSION['permisos'];           
            $val = $seguridad->Validar($modulo, $tipo);            
            $retVal = ($val->leer == 1 ) ? require_once 'View/usuarios/dashboard.php' : require_once 'View/segurity/error.php' ;
        
        require_once 'View/footers/footer.php';
    }

    public function Add()
    {   session_start();
        $alm = new Inmueble();
        if (isset($_REQUEST['id'])) {
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        $seguridad = new Seguridad(); 
        $modulo= 'inmueble';
        $tipo= $_SESSION['rol'];                   
        $val = $seguridad->Validar($modulo, $tipo);            
        $retVal = ($val->crear == 1 ) ? require_once 'View/Inmuebles/add.php' : require_once 'View/segurity/error.php' ;
    
        
    }

    public function Crud()
    {
        $alm = new Inmueble();
            $alm->id= $_REQUEST['id'];
            $alm->usuario_id= $_REQUEST['usuario_id'];
            $alm->infra_id= $_REQUEST['infra_id'];
            $alm->telefono= $_REQUEST['telefono'];
            $alm->correo= $_REQUEST['correo'];
            $alm->numero= $_REQUEST['numero'];
            $alm->tipo_inmueble= $_REQUEST['tipo_inmueble'];
            $alm->creacion= $_REQUEST['creacion'];
            $alm->actualizacion= $_REQUEST['actualizacion'];
            $alm->tipomasc= $_REQUEST['tipomasc'];
            $alm->cantidadmasc= $_REQUEST['cantidadmasc'];
           // echo
//exit();
        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);      


            echo'
                   <script>
                           alert("EL REGISTRO SE CREO CON EXITO"); 
                           window.location = "?c=inmuebles&a=index&id='.$alm->infra_id.'";   
                   </script>
            
            ';

    }

public function Index(){
    require_once 'View/headers/header.php';
        $seguridad = new Seguridad(); 
        $modulo= 'inmueble';
        $tipo= $_SESSION['rol'];                 
        $val = $seguridad->Validar($modulo, $tipo);            
        $retVal = ($val->leer == 1 ) ? require_once 'View/Inmuebles/index.php' : require_once 'View/segurity/error.php' ;
    require_once 'View/footers/footer.php';
}


}
