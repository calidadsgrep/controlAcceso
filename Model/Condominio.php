<?php
require_once 'Model/Permiso.php';
require_once 'Model/Seguridad.php';

class Condominio
{
	private $pdo;
    public $id;
    public $nit;
    public $tipo_infraestrura;
    public $nombre;
	public $direccion;
	public $telefono;
	public $barrio;
    public $ciudad;
	public $administrador;
	public $creacion;
    public $actualizacion;
    public $num_inmueble;	

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

	public function Listar()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT infraestructura.*,infraestructura.id as infra, infraestructura.nombre as infra_nom, tipo_infraestructura.*,tipo_infraestructura.id as tipo 
                                              FROM infraestructura , tipo_infraestructura 
                                              WHERE infraestructura.tipo_infraestrura=tipo_infraestructura.id 
                                            ");
			$stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    public function Obtener($id)
	{
		
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT infraestructura.*,infraestructura.id as infra, infraestructura.nombre as infra_nom, tipo_infraestructura.*,tipo_infraestructura.id as tipo 
                                              FROM infraestructura , tipo_infraestructura 
                                              WHERE infraestructura.id=$id
                                              AND
											  infraestructura.tipo_infraestrura = tipo_infraestructura.id 
                                               ");
			$stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data){

		print_r($data);
           $id  = $data->id;
		   $nit = $data->nit;
		   $tipo_infraestrura = $data->tipo_infraestrura;
		   $nombre = $data->nombre;
		   $direccion = $data->direccion;
		   $telefono = $data->telefono;
		   $barrio = $data->barrio;
		   $ciudad = $data->ciudad;
		   $administrador = $data->administrador;
		   $actualizacion = $data->actualizacion;
		   $num_inmueble = $data->num_inmueble;

		try {
			//code...
		$sql = "UPDATE infraestructura SET tipo_infraestrura='$tipo_infraestrura', nit='$nit',nombre='$nombre',direccion='$direccion',telefono='$telefono', barrio='$barrio',ciudad='$ciudad',administrador='$administrador', num_inmueble='$num_inmueble', actualizacion='$actualizacion' WHERE id ='$id'";
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}


	}




    public function Listar_infra()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM  tipo_infraestructura WHERE tipo='infra'");
			$stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
   





	public function Registrar(Condominio $data)
	{
	    //print_r($data);
	    //exit();
		try 
		{
		$sql = "INSERT INTO infraestructura (tipo_infraestrura, nit, nombre, direccion, telefono, 
                                     barrio, ciudad, administrador, num_inmueble, creacion, actualizacion ) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $data->tipo_infraestrura,
                        $data->nit, 
						$data->nombre, 
                        $data->direccion, 
                        $data->telefono,
                        $data->barrio,
                        $data->ciudad,                        
                        $data->administrador,
                        $data->num_inmueble,
                        $data->creacion,
                        $data->actualizacion
                )
			);


		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}




?>