<?php
session_start();
require_once 'Model/Informe.php';

class InformesController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Informe();
    }

    public function Personas()
    {
        $persona = $this->model->Ingreso_Personas();

        require_once 'View/informe/personas.php';
    }
    public function Clientes()
    {

        $cliente = $this->model->Cliente($_SESSION['infraestructura']);
        require_once 'View/informe/cliente.php';
    }

    public function Habitantes()
    {
        $habitantes = $this->model->Habitante($_REQUEST['inmu_id']);
        require_once 'View/informe/habitantes.php';
    }

    public function Correspondencia()
    {
        $correspondencia = $this->model->Correspondencias();
        require_once 'View/informe/correspondencia.php';
    }
}
