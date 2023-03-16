<?php

namespace App\Controllers;

use App\Models\Consulta_Model;
use App\Models\Usuario_Model;

class SesionUsuario_controller extends BaseController
{
	protected $relasLogin;

// 	public function ver_IniciarSesion() {
// 		$data['titulo'] = 'Loguin';
// 		return view('plantillas/header',$data).view('plantillas/nav').view('contenido/IniciarSesion_view').view('plantillas/footer');
// 	}

// 	public function iniciarUsuario(){
// 		$request = \Config\Services::request();
// 		$user_Model = new Usuario_Model();
// 		$session = session();

// 		$email = $request->getPost('email');
// 		$pass = $request->getPost('contraseña');
// 		$user = $user_Model->where('email', $email)->first();

// 		if($user){
// 			$pass_user = $user['contraseña'];
// 			$pass_verif = password_verify($pass, $pass_user);
// 			if($pass_verif){
// 				$data = [
// 					'id_usuario' =>$user['id_usuario'],
// 					'nombre' =>$user['nombre'],
// 					'apellido' =>$user['apellido'],
// 					'perfil_id' =>$user['perfil_id'],
// 					'login' => TRUE];
// 					$session->set($data);
// 					switch (session('perfil_id')){
// 						case'1':
// 						return redirect()->route('admin_usuario');
// 						break;
// 						case'2':
// 						return redirect()->route('/');
// 						break;
// 					}
// 			}else{
// 				$session->setFlashdata('mensaje','email y/o contrseña incorrecta.');
// 			}
// 		}else{
// 				$session->setFlashdata('Contrseña incorrecta.');}
// 				return redirect()->route('iniciarsesion');
// 	}

// 		public function cerrarSession(){
// 		$session = session();
// 		$session->destroy();
// 		return redirect()->route('iniciarsesion');
// 	}

// }

	public function login(){
		echo base_url ('inicioSesion');
	}
	
	public function valida(){
		$user_Model = new Usuario_Model();
		$this->reglasLogin= [
		'email' => [
                'rules'=> 'required|valid_email',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.',
                    'valid_email' => 'El email ingresado no es válido.',
                ]
            ],
            'pass' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]
        ];

        if($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)){
        	$email = $this->request->getPost('email');
        	$pass = $this->request->getPost('pass');
        	$datosUsuario = $user_Model->where('email', $email)->first();

        	if($datosUsuario != null){
        		$pass_user = $datosUsuario['contraseña'];
				$pass_verif = password_verify($pass, $pass_user);
        		if($pass_verif){
        			$datosSesion = [
        				'id_usuario' => $datosUsuario['id_usuario'],
        				'nombre' => $datosUsuario['nombre'],
        				'apellido' => $datosUsuario['apellido'],
        				'perfil_id' => $datosUsuario['perfil_id'],
        			];

        			$session = session();
        			$session->set($datosSesion);
        			return redirect()->to(base_url().'/');
        		} else {
        			$data['error'] = "Contraseña incorrecta.";
        			echo view('plantillas/header',$data).view('plantillas/nav').view('contenido/Usuarios/IniciarSesion_view').view('plantillas/footer');
        		}
        	} else {
        		$data['error'] = "El usuario no existe";
        		echo view('plantillas/header',$data).view('plantillas/nav').view('contenido/Usuarios/IniciarSesion_view').view('plantillas/footer');
        	}
        } else {
        	$data = ['validation' => $this->validator];
        	echo view('plantillas/header',$data).view('plantillas/nav').view('contenido/Usuarios/IniciarSesion_view').view('plantillas/footer');
        }	
	}

	public function cerrarSesion(){
		$session = session();
		$session->destroy();
		return redirect()->to(base_url());
	}
}

	// public function __construct(){
	// 	session_start();
	// }

	// public function setCurrenUser($usuario){
	// 	$_SESSION['usuario'] = $usuario;
	// }

	// public function getCurrentUset(){
	// 	return $_SESSION['usuario']
	// }

	// public function iniciarsesion(){
	// 	$sesionUsuario = new SesionUsuario();
	// 	$usuario = new Usuario();

	// 	if(isset($_SESSION['usuario'])){

	// 	}else if(isset($_POST['usuario']) && isset($_POST['contraseña'])){

	// 	}else{
	// 		include_once'plantillas/header', $data).view('contenido/IniciarSesion_view').view ('plantillas/footer';
	// 	}
	// }

	// public function cerrarSesion(){

 //    $userSession = new UsuarioModel();
 //    $userSession->closeSession();

 //    return redirect()->to(base_url().'/');;
	// }
