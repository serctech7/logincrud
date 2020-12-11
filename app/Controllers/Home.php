<?php namespace App\Controllers;
	use App\Models\Usuarios;
class Home extends BaseController
{
	public function index()
	{
		$mensaje = session('mensaje');
		return view('login', ["mensaje" => $mensaje]);

	}

	public function inicio() {
		return view('inicio');
		{
		$Crud = new CrudModel();
		$datos = $Crud->listarNombres();

		$mensaje = session('mensaje');

		$data = [
					"datos" => $datos,
					"mensaje" => $mensaje
				];

		return view('listado', $data);
    }
    
	public function crear()
	{
		$datos = [
					"concepto_g" => $_POST['concepto_g'],
					"monto_g" => $_POST['monto_g'],
					"fecha" => $_POST['fecha']
				];
				$Crud = new CrudModel();
				$respuesta = $Crud->insertar($datos);

				if ($respuesta > 0) {
					return redirect()->to(base_url().'/')->with('mensaje','1');
				}else {
					return redirect()->to(base_url().'/')->with('mensaje','0');
				}
	}

	public function actualizar()
	{
		$datos = [
			"id_datos" => $_POST['idDatos'],
			"concepto_g" => $_POST['concepto_g'],
			"monto_g" => $_POST['monto_g'],
			"fecha" => $_POST['fecha']
		];

		$idDatos = $_POST['idDatos'];

		$Crud = new CrudModel();

		$respuesta = $Crud->actualizar($datos, $idDatos);

		if ($respuesta) {
			return redirect()->to(base_url().'/')->with('mensaje','2');
		}else {
			return redirect()->to(base_url().'/')->with('mensaje','3');
		}
	}

	public function obtenerNombre($idDatos)
	{
		$data = ["id_nombre" => $idDatos];
		$Crud = new CrudModel();
		$respuesta = $Crud->obtenerNombre($data);

		$datos = ["datos" => $respuesta];
		
		return view('actualizar', $datos);
	}

	public function eliminar($idDatos)
	{
		$Crud = new CrudModel();
		$data = ["id_nombre" => $idDatos];

		$respuesta = $Crud->eliminar($data);

		if ($respuesta) {
			return redirect()->to(base_url().'/')->with('mensaje','4');
		}else {
			return redirect()->to(base_url().'/')->with('mensaje','5');
		}
	}
	}

	public 	function login() {

		$nombre = $this->request->getPost('nombre');
		$apellido_p = $this->request->getPost('apellido_p');
		$email = $this->request->getPost('email');
		$usuario = $this->request->getPost('usuario');
		$password = $this->request->getPost('password');
		$Usuario = new Usuarios();

		$datosUsuario = $Usuario->obtenerUsuario(['usuario' => $usuario]);

		if (count($datosUsuario) > 0  && password_verify($password, $datosUsuario[0]['password'])) {

			$data =[
						"nombre" => $datosUsuario[0]['nombre'],
						"apellido_p" => $datosUsuario[0]['apellido_p'],
						"email" => $datosUsuario[0]['email'],
						"usuario" => $datosUsuario[0]['usuario'],
						"type" => $datosUsuario[0]['type']
					];

			$session = session();
			$session->set($data); 

			return redirect()->to(base_url('/inicio'))->with('mensaje','1');

		}else{
			return redirect()->to(base_url('/'))->with('mensaje','0');
		}

	}

	public function salir(){
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/'));
	}




	//--------------------------------------------------------------------

}
