<?php

require_once 'Model/Control.php';
require_once 'Model/Seguridad.php';
class AccesopersonasController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Accesopersona();
    }
    
    public function Dashboard(){
        
        require_once 'View/headers/header.php';
        require_once 'View/control/dashboard.php';
        require_once 'View/footers/footer.php';
        
    }


    public function Personas(){                
        sleep(1);
        require_once 'View/control/personas.php';     
        
    }

    public function Crear_personas(){    
       
        require_once 'View/control/crear_personas.php';     
        
    }

    public function Habitantes(){    
       
        require_once 'View/control/habitantes.php';     
        
    }

    public function Registrar(){
         sleep(1);
        $alm = new Accesopersona();
        $alm->visitante_id = $_REQUEST['visitante_id'];
        $alm->hora = $_REQUEST['hora'];
        $alm->fecha = $_REQUEST['fecha'];
        $alm->asunto = $_REQUEST['asunto'];
        $alm->destino = $_REQUEST['destino'];
        $alm->tipo = $_REQUEST['tipo'];
        $alm->placa = $_REQUEST['placa'];
        $alm->color = $_REQUEST['color'];
        $alm->autoriza = $_REQUEST['habitante'];
        $alm->funcionario = $_REQUEST['funcionario'];
        

        $this->model->RegistrarVisita($alm);

    }


    public function Salida(){
           
      $id = $_REQUEST['id'];
      $sali=  $this->model->ObtenerVisita($id);
      $tools= $this->model->VerToolsalida($id);
      require_once 'View/control/salida.php'; 

    }
    public function RegistrarSalida(){
        $alm = new Accesopersona();

        $alm->id = $_REQUEST['id']; 
        $alm->hora = $_REQUEST['hora'];
        $alm->fecha = $_REQUEST['fecha'];
        $alm->asunto = 'Salida';
        $alm->svehiculo = $_REQUEST['svehiculo'];
        $alm->observacion = $_REQUEST['observacion'];
        $alm->funcionario =$_REQUEST['funcionario'];
        $alm->objetos ='n/a';
        $alm->salida =$_REQUEST['salida'];
        
       $this->model->RegistrarSalida($alm);
       if($alm->salida >= 1){

        foreach($alm->salida as $key=>$salidas){
                 echo $salidas ;
                 echo $key ;
        $this->model->ToolSalida($key, $salidas);  
        }

       }
         
  
      }

     public function Infovisita(){
        $info=  $this->model->ObtenerVisita($_REQUEST['id']);
        $tools=$this->model->VerTools($_REQUEST['id']);
        require_once 'View/control/informe.php'; 

     }

     public function herramientas(){
        sleep(1);
        $info=  $this->model->ObtenerVisita($_REQUEST['id']);
        require_once 'View/control/herramientas.php'; 
     }
    
     public function HerramientasAdd(){
        $alm = new Accesopersona();
        sleep(1);        
        $alm->item = $_REQUEST['item'];
        $alm->cantidad = $_REQUEST['cantidad'];
        $alm->visita = $_REQUEST['visita'];
        $alm->tipo = $_REQUEST['tipo'];
        $alm->estado = '1';

        if ($alm->item > 1) {
            # code...
            $this->model->Add_herramienta($alm);

        }



     }






}