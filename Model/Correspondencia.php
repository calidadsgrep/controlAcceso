<?php

require_once 'Model/database.php';

class Correspondencia
{
	private $pdo;
	public $id;
    public $fecha_llegada;
	public $guarda_recibe;
	public $tipo_correspondencia;
	public $destino;
	public $fecha_entrega;
	public $guarda_entrega;
	public $residente_recibe;

	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Index()
	{
		try {
			//code...
			$index = $this->pdo->prepare("SELECT correspondencias.*, inmuebles.numero, tipo_inmueble.tipo
										FROM correspondencias,inmuebles,tipo_inmueble
										WHERE
										correspondencias.destino=inmuebles.id
										AND
										 inmuebles.tipo_inmueble= tipo_inmueble.id ");
			$index->execute();
			return $index->fetchAll(PDO::FETCH_OBJ);
		} catch (\Throwable $th) {
			//throw $th;
		}
	}

	public function Add()
	{
	}
	public function View($id)
	{
		try {
			//code...
			$index = $this->pdo->prepare("SELECT correspondencias.*, inmuebles.numero, tipo_inmueble.tipo
										FROM correspondencias,inmuebles,tipo_inmueble
										WHERE
										correspondencias.id=$id
										AND
										correspondencias.destino=inmuebles.id
										AND
										 inmuebles.tipo_inmueble= tipo_inmueble.id");
			$index->execute();
			return $index->fetch(PDO::FETCH_OBJ);
		} catch (\Throwable $th) {
			//throw $th;
		}
	}
	public function Delete()
	{
	}


	public function Destinos($id)
	{
		$index = $this->pdo->prepare("SELECT  inmuebles.numero,inmuebles.id AS inmue, tipo_inmueble.tipo
		FROM inmuebles,tipo_inmueble
		WHERE		
		 inmuebles.tipo_inmueble= tipo_inmueble.id 
		 AND
		 inmuebles.infra_id=$id
		 ");
		$index->execute();
		return $index->fetchAll(PDO::FETCH_OBJ);
	}

	public function Residentes($id)
	{
		$index = $this->pdo->prepare("SELECT usuarios.id, CONCAT(usuarios.nombres,' ',usuarios.apellidos) AS fullName, usu_inmu.*
		FROM usuarios, usu_inmu
		WHERE		
		usu_inmu.inmueble_id= $id 
		 AND
		 usu_inmu.usuario_id=usuarios.id
		 ");
		$index->execute();
		return $index->fetchAll(PDO::FETCH_OBJ);
	}

	public function Registrar($data)
	{
		try {
			$sql = "INSERT INTO correspondencias(fecha_llegada, guarda_recibe, tipo_correspondencia, destino) 
		        VALUES (?, ?, ?, ?)";

			$this->pdo->prepare($sql)->execute(
				array(
					$data->fecha_llegada,
					$data->guarda_recibe,
					$data->tipo_correspondencia,
					$data->destino,

				)
			);
			//$imnueble_id = $this->pdo->lastInsertId();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($entrega)
	{
		$id = $entrega->id;
		$fecha_entrega = $entrega->fecha_entrega;
		$guarda_entrega = $entrega->guarda_entrega;
		$residente_recibe = $entrega->residente_recibe;

		try {
			$sql = "UPDATE correspondencias SET  fecha_entrega='$fecha_entrega', guarda_entrega='$guarda_entrega', residente_recibe='$residente_recibe' WHERE id ='$id'";
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			die($e->getMessage());
			//throw $th;
		}
	}
}
