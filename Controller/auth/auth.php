<?php 
  session_start();
  date_default_timezone_set("America/Bogota");
  require('bd_conection.php');
  require_once '../../clases/user_info.php';
   $user=$_POST['usuario'];
   $clave=md5($_POST['clave']);
   $estado=1;

  try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT *  FROM usuarios WHERE usuario = :user AND clave = :pass AND estado= :est" );
          $stmt->bindParam(':user', $user);
          $stmt->bindParam(':pass', $clave);
          $stmt->bindParam(':est', $estado);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $rec = count($result);
       // print_r($result);

       if ($rec === 0) {
        $_SESSION['logueado']= false;
      header("location:../../usuarios/login.php?error=1");

 }else{
 $id_user=$result[0]['id'];
 $_SESSION['all']=$result;
 $_SESSION['rol']=$result[0]['rol_id'];
 $rol_id=$result[0]['rol_id'];
 /* datos del usuari que ingresa*/
 $c_info = new Users_info;
 $ip= $c_info->c_ip();
 $device = $c_info->c_Device();
 $browser = $c_info->c_Browser();
 $c_OS = $c_info->c_OS();
 $fecha= date('Y-m-d H:i:s');
/* datos del usuari que ingresa*/ 
 //exit();
 try{
     
     $sql = "INSERT INTO  user_info (ip, device, browser, c_os, fecha, usuario) 
           VALUES (?, ?, ?, ?, ?, ?)";
   
    $stmt = $conn->prepare($sql)->execute(
           array(  
                  @$data->ip =$ip,
                   $data->device =$device, 
                   $data->browser =$browser,
                   $data->c_os = $c_OS,
                   $data->fecha = $fecha, 
                   $data->usuario=$_POST['usuario']
           )
       );
    
 }catch(Exception $e){
     die($e->getMessage());
 }
 
  try
   {
       $result = array();

       $stm = $conn->prepare("SELECT permisos.*,modulos.* FROM permisos,modulos
                                   WHERE rol_id=$rol_id 
                                   AND permisos.modulo_id=modulos.id
                                   AND estado='menu'");
       $stm->execute();
       
       
       $menu= $stm->fetchAll(PDO::FETCH_OBJ);
   }
   catch(Exception $e)
   {
       die($e->getMessage());
   }




   try
   {
       $result = array();

       $stm =  $conn->prepare("SELECT permisos.*,modulos.* FROM permisos,modulos
                                   WHERE
                                   estado='sub'
                                   AND permisos.modulo_id=modulos.id
                                   ");
       $stm->execute();
       $submenu=  $stm->fetchAll(PDO::FETCH_OBJ);
   }
   catch(Exception $e)
   {
       die($e->getMessage());
   }
   

 
  /*echo'<pre>';
    print_r($menu);
  echo'</pre>';*/
 
 $_SESSION['menu']=$menu;
 $_SESSION['submenu']=$submenu;
     
     switch ($rol_id) {
         
     case 1:
     
     $_SESSION['logueado']= true;
     $_SESSION['usuario']=$user;
     $_SESSION['rol']=$rol_id;
    
     header("location:../../usuarios/index.php?c=Usuario&a=complementarios&id=$id_user");
  // 'Aspirante';
     break;
     case 2:
         $_SESSION['logueado']= true;
         $_SESSION['usuario']=$user;
         $_SESSION['rol']=$rol_id;
       header("location:../../usuarios/index.php?c=Usuario&a=complementarios&id=$id_user");
 //echo 'Auxiliar';
       break;
     case 3:
         
         $_SESSION['logueado']= true;
         $_SESSION['usuario']=$user;
         $_SESSION['rol']=$rol_id;
          header("location:../../usuarios/index.php?c=Usuario&a=Buscar");
       //  echo 'Administrativo';
       break;
 
     case 4:
     case 9:
     case 8:
     case 10:
     case 11:
     case 12:
     case 13:
     case 14:
     case 15:    
        $_SESSION['logueado']= true;
        $_SESSION['usuario']=$user;
        $_SESSION['rol']=$rol_id;
          header("location:../../usuarios/index.php?c=Usuario&a=Buscar");
      //  echo 'Supervisor';
       break;

    case 5:
     
     $_SESSION['logueado']= true;
     $_SESSION['usuario']=$user;
     $_SESSION['rol']=$rol_id;
   //  echo 'root';
  @header("location:../../usuarios/index.php?c=Usuario&a=Buscar");
    //root
       break;
       
     case 6:
             $_SESSION['logueado']= true;
             $_SESSION['usuario']=$user;
             $_SESSION['rol']=$rol_id;
             $cookie_name = "Seleccionado";
               $cookie_value = "true";
               setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
               header("location:../../usuarios/index.php?c=Usuario&a=complementarios&id=$id_user");
             
     break;
     case 7:
             echo'Aun no se encuentra autorizado para ingresar.';
     break;

}
 }

 
    }catch(Exception $e){

        die($e->getMessage());
    
      }



?>