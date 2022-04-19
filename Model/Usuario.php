<?php
require_once 'Model/Permiso.php';
class Usuario
{
	private $pdo;
	public $id;
	public $tipo_identificacion;
	public $num_identificacion;
	public $nombres;
	public $apellidos;
	public $telefono;
	public $direccion;
	public $correo;
	public $foto;
	public $username;
	public $password;
	public $estado;
	public $infraestructura_id;
	public $tipo_usuario;
	public $tsangre;
	public $created;
	public $modified;
	public $alergias;
	public $genero;
	public $mreducida;

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
			$stm = $this->pdo->prepare("SELECT usuarios.*, usuarios.id AS user_id, tipo_usuarios.tipo FROM usuarios, tipo_usuarios WHERE usuarios.tipo_usuario=tipo_usuarios.id");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{

		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT usuarios.*
			                                  FROM  usuarios
                                              WHERE 
											     usuarios.id=$id
											   ");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{


		$id  = $data->id;
		$nombre = $data->nombres;
		$direccion = $data->direccion;
		$telefono = $data->telefono;
		$correo = $data->correo;
		$apellidos = $data->apellidos;
		$tipo_identificacion = $data->tipo_identificacion;
		$identificacion = $data->num_identificacion;
		$foto = $data->foto;
		$actualizacion = $data->modified;
		$infraestructura_id = $data->infraestructura_id;
		$fnacimiento = $data->fnacimiento;
		$genero = $data->genero;
		$tsangre = $data->tsangre;
		$alergias = $data->alergias;
		$mreducida = $data->mreducida;


		try {
			//code...
			$sql = "UPDATE usuarios SET   mreducida = '$mreducida', tsangre = '$tsangre' , genero = '$genero',  alergias = '$alergias' , fnacimiento='$fnacimiento', infraestructura_id='$infraestructura_id', tipo_identificacion='$tipo_identificacion', num_identificacion='$identificacion', nombres='$nombre', apellidos='$apellidos',telefono='$telefono', correo='$correo', direccion='$direccion', foto='$foto', modified='$actualizacion' WHERE id ='$id'";
			$this->pdo->prepare($sql)->execute();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar_infra()
	{
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM  tipo_infraestructura WHERE tipo='SUB'");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Registrar(Usuario $data)
	{
		//print_r($data);
		// exit();
		try {
			$sql = "INSERT INTO usuarios(tipo_identificacion, num_identificacion, nombres, apellidos, telefono, 
                                     direccion, correo, foto, username, password, estado, tipo_usuario,infraestructura_id, created ,modified) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(

						$data->tipo_identificacion,
						$data->num_identificacion,
						$data->nombres,
						$data->apellidos,
						$data->telefono,
						$data->direccion,
						$data->correo,
						$data->foto,
						$data->username,
						$data->password,
						$data->estado,
						$data->tipo_usuario,
						$data->infraestructura_id,
						$data->created,
						$data->modified,


					)
				);
			$nombre = $data->nombres . ' ' . $data->apellidos;
			$id = $this->pdo->lastInsertId();

			if ($data->tipo_usuario == 8) :
				echo "
                 alert('El registro de .$nombre. se realizo con éxito ');
                 window.location = '?c=usuarios&a=ver&id=. $id .';
            ";
			else :
				echo "
				alert('El registro de .$nombre. se realizo con éxito ');
                 window.location = '?c=usuarios&a=dashboard&id=. $id .';
            ";

			endif;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Foto()
	{

		/* Tomar una fotografía y guardarla en MySQL */
		$imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
		if (strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
		//La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
		$imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));

		//Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y
		//todo el contenido lo guardamos en un archivo
		$imagenDecodificada = base64_decode($imagenCodificadaLimpia);

		//Calcular un nombre único
		$nombreImagenGuardada = "View/img/fotos/foto_" . uniqid() . ".png";

		//Escribir el archivo
		file_put_contents($nombreImagenGuardada, $imagenDecodificada);
		//guardar el nombre del archivo
		//exit();
		//$stm = $this->pdo->prepare->prepare("INSERT INTO fotos(foto) VALUES(?)");
		//$stm->execute([$imagenCodificadaLimpia]);
		//$id = $stm->lastInsertId();

		//Terminar y regresar el nombre de la foto
		//return $id;
		exit($nombreImagenGuardada);
	}

	public function Inmuebles()
	{

		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT infraestructura.nombre AS infra_nom, infraestructura.id AS infra_id, tipo_infraestructura.nombre as tipo 
									FROM   infraestructura, tipo_infraestructura
									WHERE 
									infraestructura.tipo_infraestrura = tipo_infraestructura.id");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Tipo_usuarios()
	{
		echo $_SESSION['rol'];
		try {
			$result = array();

			if ($_SESSION['rol'] == 4) {
				# code...
				$stm = $this->pdo->prepare("SELECT * FROM tipo_usuarios ");
			}
			if ($_SESSION['rol'] == 3) {
				# code...
				$stm = $this->pdo->prepare("SELECT * FROM tipo_usuarios WHERE tipo IN('Propietario','Inquilino','Administrador') ");
			}
			if ($_SESSION['rol'] == 5) {
				# code...
				$stm = $this->pdo->prepare("SELECT * FROM tipo_usuarios WHERE tipo IN('Vigilante','Supervisor', 'Dir Operativo') ");
			}

			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Ver($identificacion)
	{
		try {
			//code...
			$stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE num_identificacion=$identificacion ");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}


	public function ObtenerInmuebles($id)
	{
		try {
			//code...
			$stm = $this->pdo->prepare("SELECT inmuebles.numero,inmuebles.id,tipo_inmueble.tipo 
		 								FROM inmuebles, tipo_inmueble
										 WHERE infra_id =$id
										    AND inmuebles.tipo_inmueble=tipo_inmueble.id ");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	public function Visitas($id)
	{


		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT visitas.*, CONCAT(usuarios.nombres,' ', apellidos)AS habitante ,inmuebles.numero, tipo_inmueble.tipo
									   FROM  usuarios, visitas, inmuebles, tipo_inmueble
									   WHERE 
									   visitas.visitante_id=$id
										  AND visitas.habitante=usuarios.id
										  AND visitas.destino=inmuebles.id
										  AND tipo_inmueble.id=inmuebles.tipo_inmueble 
										  ORDER BY visitas.fecha DESC , visitas.hora DESC
										 LIMIT 4");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Ult_Visitas($id)
	{

		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT fecha as entrada
		 FROM visitas
		 WHERE 
		 visitas.fecha_sal IS NULL 
		 AND visitas.visitante_id=$id");

			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
