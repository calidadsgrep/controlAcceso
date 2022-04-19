<?php

require_once 'Model/database.php';

class Accesopersona

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

	public function Listar()
	{
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT infraestructura.*,infraestructura.id as infra, infraestructura.nombre as infra_nom, tipo_infraestructura.*,tipo_infraestructura.id as tipo 
                                              FROM infraestructura , tipo_infraestructura 
                                              WHERE infraestructura.tipo_infraestrura=tipo_infraestructura.id 
                                            ");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($var)
	{
		//echo $var;
		try {
			$result = array();
			if (is_numeric($var)) {
				# code...
				$stm = $this->pdo->prepare("SELECT * FROM  usuarios WHERE num_identificacion LIKE  '%" . $var . "%'");
			} else {
				# code...
				$stm = $this->pdo->prepare("SELECT * FROM  usuarios WHERE nombres LIKE  '%" . $var . "%' OR  apellidos LIKE  '%" . $var . "%' ");
			}

			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{

		//print_r($data);
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
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM  tipo_infraestructura WHERE tipo='infra'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}






	public function Registrar(Condominio $data)
	{
		//print_r($data);
		//exit();
		try {
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
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Habitantes($id)
	{
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT usu_inmu.*, usuarios.nombres,apellidos
			                             FROM  usuarios, usu_inmu
										 WHERE usu_inmu.usuario_id=usuarios.id
										 AND   usu_inmu.inmueble_id=$id");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function RegistrarVisita($data)
	{

		try {

			$sql = "INSERT INTO visitas (visitante_id,fecha, hora, asunto, destino, habitante, 
                                     tipo_vehiculo, placa, color, funcionario) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->visitante_id,
						$data->fecha,
						$data->hora,
						$data->asunto,
						$data->destino,
						$data->autoriza,
						$data->tipo,
						$data->placa,
						$data->color,
						$data->funcionario,

					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
			//throw $th;
		}
	}



	public function ObtenerVisita($id)
	{

		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT visitas.*, CONCAT(usuarios.nombres,' ', apellidos)AS habitante ,inmuebles.numero, tipo_inmueble.tipo
									   FROM  usuarios, visitas, inmuebles, tipo_inmueble
									   WHERE 
									   visitas.id=$id
										  AND visitas.habitante=usuarios.id
										  AND visitas.destino=inmuebles.id
										  AND tipo_inmueble.id=inmuebles.tipo_inmueble 
										  ");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
			//throw $th;
		}
	}

	public function RegistrarSalida($salida)
	{
		$fecha = $salida->fecha;
		$hora = $salida->hora;
		$vehiculo_sal = $salida->svehiculo;
		$observacion = $salida->observacion;
		$asunto_sal = $salida->asunto;
		$user_sal = $salida->funcionario;
		$objetos = $salida->objetos;
		$id = $salida->id;
		try {

			$sql = "UPDATE visitas SET  objetos_sal='$objetos', user_sal='$user_sal', asunto_sal='$asunto_sal',  fecha_sal='$fecha', hora_sal='$hora', vehiculo_sal='$vehiculo_sal',observacion='$observacion' WHERE id ='$id'";
			$this->pdo->prepare($sql)->execute();

		} catch (Exception $e) {
			die($e->getMessage());
			//throw $th;
		}
	}

	public function ToolSalida($key, $salidas)
	{
		$estado = $salidas;
		$id = $key;
		try {

			$sql = "UPDATE  herramientas SET estado=$estado  WHERE id ='$id'";
			$this->pdo->prepare($sql)->execute();
			
		} catch (Exception $e) {
			die($e->getMessage());
			//throw $th;
		}
	}





	public function Add_herramienta($data)
	{

		foreach ($data->cantidad as $key => $cantidades) {
			# code...
			try {
				$sql = "INSERT INTO herramientas (item ,cantidad, visita_id,tipo,estado)
		        VALUES (?, ?, ?, ?, ?)";

				$this->pdo->prepare($sql)
					->execute(
						array(
							$data->item[$key],
							$data->cantidad = $cantidades,
							$data->visita,
							$data->tipo[$key],
							$data->estado,
						)
					);
			} catch (Exception $e) {
				die($e->getMessage());
			}
			// return true;
		}
	}
 public function VerTools($id){

	try {
		$result = array();
		$stm = $this->pdo->prepare("SELECT * FROM  herramientas WHERE visita_id=$id");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	} catch (Exception $e) {
		die($e->getMessage());
	}


 }


 public function VerToolsalida($id){

	try {
		$result = array();
		$stm = $this->pdo->prepare("SELECT * FROM  herramientas WHERE visita_id=$id AND tipo='Herramienta' AND estado='1' ");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	} catch (Exception $e) {
		die($e->getMessage());
	}

 }


}
