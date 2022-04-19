<?php
require_once 'Model/Seguridad.php';
class SeguridadController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Seguridad();
    }
    
    public function Index(){
        
       // require_once 'View/headers/header.php';
        require_once 'View/segurity/Login.php';
       // require_once 'View/header/footer.php';
        
    }    

    public function Logout(){
      session_start();
      session_unset();
      session_destroy();
      echo "<script type='text/javascript'>      
      window.location.href = '../controlAcceso?salir=true';
      </script>";
      
       
   }
    
    public function Autenticacion(){
    $u=  md5($_REQUEST['password']);
    $c= $_REQUEST['username'];
    $user=  $this->model->Auth($u, $c);
    session_start(); 
    $result_user =  count($user);
    
//

      if ($result_user == 1) {  

        $_SESSION['log']=true; 
        $_SESSION['start'] = time();
        $_SESSION['user']= $user[0];
        $_SESSION['full_name']= $user[0]['nombres'].' '.$user[0]['apellidos'];
        $_SESSION['rol'] = $user[0]['tipo_usuario']; 
        $_SESSION['infraestructura'] = $user[0]['infraestructura_id']; 
        $_SESSION['datosinfra']=$this->model->Infra($user[0]['infraestructura_id']);
        $_SESSION['permisos'] = $this->model->Permiso($_SESSION['rol']); 
        
        
        
          echo "<script type='text/javascript'>
                window.location.href = '?c=usuarios&a=dashboard';
                </script>";
      }else{
             
                  echo "<script type='text/javascript'>
                 window.location.href = '../controlAcceso/?error=true';
                </script>";
        

      }
    }


    public function Dashboard(){
         require_once 'View/headers/header.php';
         require_once 'View/segurity/permisos.php';
         require_once 'View/footers/footer.php';  
    }

    public function Crud(){
      //require_once 'View/headers/header.php';
      require_once 'View/segurity/crud.php';
      //require_once 'View/footers/footer.php';

    }
   public function Actualizar(){
    $alm = new Seguridad();    

       $alm->id=$_REQUEST['id'];
       $alm->crear=$_REQUEST['crear'];
       $alm->leer=$_REQUEST['leer'];
       $alm->actualizar=$_REQUEST['actualizar'];
       $alm->borrar=$_REQUEST['borrar'];
       $alm->tipo_usuarios=$_REQUEST['tipo_usuarios'];
     // exit();
     
      $this->model->Actualizar($alm);

   }

   public function Ver()
   {
   // sleep(1);
    require_once 'View/segurity/ver.php';
   }
    


}
?>
