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
            $ip = $this->pdo->prepare("SELECT visitas.*, usuarios.*, inmuebles.numero, tipo_inmueble
                                FROM visitas
                                JOIN  usuarios ON visitas.visitante_id = usuarios.id   
                                JOIN  inmuebles ON visitas.destino = inmuebles.id                                
                                WHERE visitas.fecha='$fecha'         
                                ");


            $ip->execute();
            return $ip->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Tipo_Inmueble($id)
    {
        try {
            $ip = $this->pdo->prepare("SELECT tipo_inmueble.tipo FROM  tipo_inmueble WHERE id=$id ");
            $ip->execute();
            return $ip->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Cliente($id)
    {
        try {
            $ip = $this->pdo->prepare("SELECT CONCAT(usuarios.nombres,' ',usuarios.apellidos) as fullname, tipo_inmueble.tipo,tipo_inmueble ,inmuebles.* 
           FROM  inmuebles, tipo_inmueble, usuarios
           WHERE inmuebles.infra_id=$id
           AND  inmuebles.tipo_inmueble= tipo_inmueble.id
           AND usuarios.id=inmuebles.usuario_id");
            $ip->execute();
            return $ip->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
