<?php

require_once 'Model/Permiso.php';
class Tipoinfra
{
	private $pdo;
    public $id;
    public $nombre;
    
	

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar_infra()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM  tipo_infraestructura");
			$stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Registrar(Seguridad $data)
	{
	   // print_r($data);
	    //exit();
		try 
		{
		$sql = "INSERT INTO usuarios (username,	password, estado, tipo_usuario, created, modified ) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $data->username, 
                        $data->password,
						$data->estado, 
                        $data->tipo_usuario, 
                        $data->created,
                        $data->modified
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}




?>