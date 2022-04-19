<?php

require_once 'Model/database.php';

class Consigna

{
	private $pdo;
	public $id;
	public $consigna;
	public $infraestructura;
	public $fecha_reg;
	public $dirigido_a;



	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar()
	{

		try {
			//code...
			$consig = $this->pdo->prepare("SELECT consignas.*, infraestructura.nombre, CONCAT(usuarios.nombres,' ',usuarios.apellidos) as fullname 
			                               FROM consignas, infraestructura, usuarios
										   WHERE consignas.infraestructura_id=infraestructura.id
										   AND consignas.dirigido_a=usuarios.id										   
										   ORDER BY fecha_reg DESC  ");
			$consig->execute();
			return $consig->fetchAll(PDO::FETCH_OBJ);
		} catch (\Throwable $th) {
			//throw $th;
		}
	}
	public function Add()
	{
	}
	public function Infraestrutura()
	{

		$infra = $this->pdo->prepare("SELECT  *  FROM   infraestructura ");
		$infra->execute();
		return $infra->fetchAll(PDO::FETCH_OBJ);
	}
	public function Personas($id)
	{

		$infra = $this->pdo->prepare("SELECT usuarios.id, CONCAT(nombres,' ',apellidos) as fullname  FROM   usuarios WHERE usuarios.infraestructura_id =$id");
		$infra->execute();
		return $infra->fetchAll(PDO::FETCH_OBJ);
	}



	public function Registrar($data)
	{


		$cons = "INSERT INTO consignas(consigna, infraestructura_id , fecha_reg, dirigido_a, duracion) 
	  		VALUES (?, ?, ?, ?, ?)";
		$this->pdo->prepare($cons)->execute(
			array(
				$data->consigna,
				$data->infraestructura_id,
				$data->fecha_reg,
				$data->dirigido_a,
				$data->duracion,
			)

		);
	}
	public function Actualizar()
	{
	}
}
