<?php
require_once 'Model/Permiso.php';
class Seguridad
{
	private $pdo;
    public $id;
    public $username;
    public $password;
    public $estado;	
	public $modulo;
	public $crear;
	public $leer;
	public $actualiar;
	public $borrar;
	public $tipo_usuarios;
	public $created;
	public $modified;

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

	public function Auth($p, $u)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE password='$p' AND username='$u' AND estado='1'");
			$stm->execute();
            return $stm->fetchAll();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Permiso($id){

		try{
               
			$stm = $this->pdo->prepare("SELECT * FROM permisos WHERE tipo_usuarios=$id");
			$stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e ){
			die($e->getMessage());
		}


	}

	public function Infra($id){

		try{
               
			$stm = $this->pdo->prepare("SELECT nombre FROM infraestructura WHERE id=$id");
			$stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);

		}catch(Exception $e ){
			die($e->getMessage());
		}


	}



	public function Actualizar($data){
		
		$id=$data->id;
		$crear=$data->crear;
		$leer=$data->leer;
		$actualizar=$data->actualizar;
        $borrar=$data->borrar;
     // exit();
		try {
			$sql = "UPDATE permisos SET crear= '$crear', leer='$leer', actualizar='$actualizar', borrar='$borrar' WHERE id = $id";
            $this->pdo->prepare($sql)->execute();

		} catch(Exception $e ){
			die($e->getMessage());
		}

	}

	public function Obtener($id){
		try{
			             
			$stm = $this->pdo->prepare("SELECT * FROM permisos WHERE id=$id");
			$stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);

		}catch(Exception $e ){
			die($e->getMessage());
		}

	}

	public function validar($modulo, $tipo){
		try{			             
			$stm = $this->pdo->prepare("SELECT * FROM permisos WHERE  modulo = '$modulo'  and tipo_usuarios='$tipo'");
			$stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);

		}catch(Exception $e ){
			die($e->getMessage());
		}

	}

}	
	
