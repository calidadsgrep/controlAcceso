<?php

require_once 'Model/Minuta.php';

class MinutasController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Minuta();
    }

    public function Index()
    {
        require_once 'View/headers/header.php';
        $puestos = $this->model->Puesto($_SESSION['infraestructura']);
        require_once 'View/minuta/index.php';
        require_once 'View/footers/footer.php';
    }

    public function Puesto()
    {
        require_once 'View/headers/header.php';
        require_once 'View/minuta/puesto.php';
        require_once 'View/footers/footer.php';
    }

    public function Guardar()
    {
        session_start();
        
        $alma = new Minuta();

        @$alma->id = $_REQUEST['id'];
        $alma->puesto_id = $_SESSION['infraestructura'];
        $alma->cantidad = $_REQUEST['cantidad'];
        $alma->item = $_REQUEST['item'];
        $alma->estado = $_REQUEST['estado'];
        @$alma->creacion = date('Y-m-d');
        @$alma->novedad = $_REQUEST['actualizacion'] . '/' . $_REQUEST['novedad'];
        @$alma->actualizacion = $_REQUEST['actualizacion'];

       
        $alma->id > 0
        ? $this->model->Actualizar_inv($alma)
        : $this->model->Registrar_inv($alma); 
      

        echo '<script>
                  alert("El registro del item de inventario de puesto se realizo con éxito.");
                   window.location = "?c=minutas&a=puesto";
                </script>';
    }

    public function Add_tramite()
    {
        session_start();
        $tramite = new Minuta;
        $tramite->tramite = $_REQUEST['tramite'];
        $tramite->portero_id = $_SESSION['user'][0];
        $tramite->puesto_id = $_SESSION['infraestructura'];
        $tramite->f_entrega = $_REQUEST['f_entrega'];
        $tramite->h_entrega = $_REQUEST['h_entrega'];
        $tramite->observacion = $_REQUEST['observacion'];

        $this->model->Guarda_Tramite($tramite);
        echo '<script>
                  alert("El registro ' . $_REQUEST['tramite'] . ' de puesto se realizo con éxito.");
                   window.location = "?c=minutas&a=index";
                </script>
            ';
    }


    public function Crud(){
        $alm = new Minuta();

        if (isset($_REQUEST['item_id'])) {
            $alm = $this->model->Update($_REQUEST['item_id']);
        }
           
        require_once 'View/minuta/inv_editar.php';
        
    }
    
 }
