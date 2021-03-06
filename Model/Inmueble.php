<?php

require_once 'Model/Permiso.php';
class Inmueble
{
	private $pdo;
    public $id;
    public $usuario_id;
    public $infra_id;
    public $telefono;
	public $correo;
	public $numero;
	public $tipo_inmueble;
	public $inmueble_id;
	public $tipo_habitante;
    public $creacion;
	public $actualizacion;
	public $tipomasc;    
	public $cantidadmasc;
	
	
    
	

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

	public function Listar($id)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT inmuebles.*, usu_inmu.*, CONCAT(usuarios.nombres,' ',apellidos) AS PERSONA, tipo_inmueble.tipo as tipoinmue, infraestructura.nombre as nomb_infraestruc,infraestructura.administrador, tipo_infraestructura.nombre as tipo_infra
                                              FROM  inmuebles,usu_inmu, usuarios, tipo_inmueble, infraestructura, tipo_infraestructura 
                                              WHERE 
											  inmuebles.infra_id=$id
											  AND
											  inmuebles.id=usu_inmu.inmueble_id
											  AND
											  usu_inmu.usuario_id=usuarios.id
											  AND
											  inmuebles.tipo_inmueble=tipo_inmueble.id
											  AND
											  inmuebles.infra_id=infraestructura.id
											  AND
											  infraestructura.tipo_infraestrura=tipo_infraestructura.id 
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
			$stm = $this->pdo->prepare("SELECT inmuebles.*,inmuebles.id as inmuebles_id , tipo_infraestructura.*, usuarios.*
			                                  FROM inmuebles, tipo_infraestructura, usuarios
                                              WHERE 
											      inmuebles.id=$id
											  AND
											      inmuebles.usuario_id = usuarios.id
                                              AND
											      inmuebles.tipo_inmueble = tipo_infraestructura.id 
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

		 //print_r($data);
           $id  = $data->id;		  
		   $usuario_id = $data->usuario_id;
		   $infra_id = $data->infra_id;
		   $telefono = $data->telefono;
		   $correo = $data->correo;
		   $numero = $data->numero;
		   $tipo_inmueble = $data->tipo_inmueble;
		   $tipomasc = $data->tipomasc;
		   $cantidadmasc = $data->cantidadmasc;
		   $creacion = $data->creacion;
		   $actualizacion   = $data->actualizacion;	     

		try {
			//code...
		$sql = "UPDATE inmuebles SET    usuario_id='$usuario_id',	infra_id='$infra_id',
		                                numero='$numero',correo='$correo',										
										telefono='$telefono', creacion='$creacion',
										tipo_inmueble='$tipo_inmueble',tipomasc='$tipomasc', 
										cantidadmasc='$cantidadmasc', 
										actualizacion='$actualizacion' 
								WHERE id ='$id'";
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
			$stm = $this->pdo->prepare("SELECT * FROM  tipo_inmueble");
			$stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
   





	public function Registrar(Inmueble $data)
	{
	    //print_r($data);
	    //exit();

		    $tipomasc   = $data->tipomasc;
	        $cantidadmasc = $data->cantidadmasc;

		try 
		{
		$sql = "INSERT INTO inmuebles(usuario_id, infra_id, telefono, correo, numero, 
                                     tipo_inmueble, tipomasc, cantidadmasc, creacion, actualizacion ) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)->execute(
				array(

					 $data->usuario_id,
					 $data->infra_id,
					 $data->telefono,
					 $data->correo,
					 $data->numero,
					 $data->tipo_inmueble,
                     $data->tipomasc,
                     $data->cantidadmasc,
					 $data->creacion,
					 $data->actualizacion,				        
                )
			);
			$imnueble_id = $this->pdo->lastInsertId();
			$sql0 = "INSERT INTO usu_inmu(usuario_id, inmueble_id ) 
					VALUES (?, ?)";

					$this->pdo->prepare($sql0)
					->execute(
					array(
					$data->usuario_id ,
					$data->inmueble_id=$imnueble_id,
					)
					);	
          } catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Habitantes(){

        try{
		$result = array();
		$stm = $this->pdo->prepare("SELECT * , CONCAT(nombres,' ',apellidos,' ',num_identificacion) AS nombre FROM usuarios WHERE  tipo_usuario IN(6, 7)");
		$stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}

	}

}




?>