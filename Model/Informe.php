<?php

require_once 'Model/database.php';

class Informe

{
    private $pdo;
    public $id;



    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Ingreso_Personas()
    {
        try {
            $fecha = date('Y-m-d');
            $ip = $this->pdo->prepare("SELECT visitas.*, usuarios.*
                                FROM visitas
                                JOIN  usuarios ON visitas.visitante_id = usuarios.id   
                                WHERE visitas.fecha='$fecha'         
                                ");


            $ip->execute();
            return $ip->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
