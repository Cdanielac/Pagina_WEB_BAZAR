<?php

namespace App\Controllers;
use App\Models\Usuario_Model;
use App\Models\Provincia_Model;
use App\Models\Perfil_Model;
use App\Controllers\BaseController;

class Usuario_controller extends BaseController
{
protected $usuarios, $perfil, $provincias;
protected $rules;
protected $reglasLogin, $reglasEditar;

public function __construct(){
    $this->usuarios = new Usuario_Model();
    $this->provincias = new Provincia_Model();
    $this->perfil = new Provincia_Model();
    helper(['form']);

    $this->rules = [
            'nombre' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'apellido' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'email' => [
                'rules'=> 'required|valid_email|is_unique[usuarios.email]',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.',
                    'valid_email' => 'El email ingresado no es válido.',
                    'is_unique' =>'Ya existe usuario con el mismo email.'
                ]
            ],
            'usuario' => [
                'rules'=> 'required|is_unique[usuarios.usuario]',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' =>'Ya existe usuario.'                
                ]
            ],
            'pass' => [
                'rules'=> 'required|min_length[4]',
                'errors'=> [
                    'required' => 'El campo contraseña es obligatorio.',
                    'min_length' => 'La contraseña debe contener al menos 4 dígitos.'
                ]
            ],

            'checkboxn' =>[
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'Debe aceptar nuestros términos y condiciones.'
                ]
            ]
        ];

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
                    'required' => 'El campo contraseña es obligatorio.'
                ]
            ]
        ];

        $this->reglasEditar = [
            'nombre' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'apellido' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]
        ];

}

public function nuevoUsuario(){
        $provincias = $this->provincias->where('activo',1)->findAll();
        $data = ['titulo' => 'Agregar Usuario', 'provincias' => $provincias];

         return view ('plantillas/header').view('plantillas/nav').view('contenido/Usuarios/CrearCuenta_view',$data).view('plantillas/footer');
    }

public function registrar_usuario()
{
        $request =\Config\Services::request();
        
        $validation = $this->validate($this->rules);
            if ($validation){
                $provincia = $request->getPost('provincia');
                $data=[
                    'nombre'=> $request->getPost('nombre'),
                    'apellido'=> $request->getPost('apellido'),
                    'email'=> $request->getPost('email'),
                    'usuario'=> $request->getPost('usuario'),
                    'contraseña'=>password_hash($request->getPost('pass'), PASSWORD_DEFAULT),
                    'telefono'=> $request->getPost('telefono'),
                    'id_provincia'=> $provincia,
                    'ciudad'=> $request->getPost('ciudad'),
                    'direccion'=> $request->getPost('direccion'),
                    'perfil_id'=> 2
                    ];
                    
                    $usuarios = new Usuario_Model();
                    $usuarios->insert($data);
                    $data ['mensaje'] = 'Registro exitoso';

                    return view('plantillas/header', $data).view('plantillas/nav').view('contenido/Usuarios/IniciarSesion_view').view ('plantillas/footer');
                    
            }else{
                $data['validation'] = $this->validator;
            }
        $data['titulo'] = 'Registrarse';
        $provincias = new Provincia_Model();
        $data ['provincias'] = $provincias->where('activo',1)->findAll();
        return view ('plantillas/header').view('plantillas/nav').view('contenido/Usuarios/CrearCuenta_view',$data).view('plantillas/footer');
    }

//INICIAR SESIÓN
    public function login(){
        $data['titulo'] = 'Loguin';
        return view('plantillas/header',$data).view('plantillas/nav').view('contenido/Usuarios/IniciarSesion_view').view('plantillas/footer');
    }
    
    public function valida(){
        $request =\Config\Services::request();

        if($request->getMethod() == "post" && $this->validate($this->reglasLogin)){
            $email = $request->getPost('email');
            $pass = $request->getPost('pass');
            $datosUsuario = $this->usuarios->where('email', $email)->first();

            if($datosUsuario != null){
                if(password_verify($pass, $datosUsuario['contraseña'])) {
                    $datosSesion = [
                        'id_usuario' => $datosUsuario['id_usuario'],
                        'nombre' => $datosUsuario['nombre'],
                        'apellido' => $datosUsuario['apellido'],
                        'perfil_id' => $datosUsuario['perfil_id'],
                        'login' => TRUE
                    ];

                    $session = session();
                    $session->set($datosSesion);
                    switch (session('perfil_id')){
                         case'1':
                         return redirect()->route('admin_usuario');
                         break;
                         case'2':
                         return redirect()->route('/');
                         break;
                     }
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

    public function modificarPerfil(){
        $request = \Config\Services::request();
        $id_usuario = $request->getPost('id_usuario');
        $data['provincias'] = $this->provincias->where('activo',1)->findAll();
        $data['usuario'] = $this->usuarios->where('id_usuario',$id_usuario)->first();
        $data ['titulo'] = 'Modificar Perfil';

        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('contenido/Usuarios/ModificarPerfil_view');
        echo view('plantillas/footer');
    }

    public function actualizarUsuario(){
        $request = \Config\Services::request();
        $id_usuario = $request->getPost('id_usuario');
        $validation = $this->validate($this->reglasEditar);
            if ($validation){
                    $provincia = $request->getPost('provincia'); 
                    $data=[
                        'nombre'=> $request->getPost('nombre'),
                        'apellido'=> $request->getPost('apellido'),
                        'telefono'=> $request->getPost('telefono'),
                        'id_provincia'=> $provincia,
                        'ciudad'=> $request->getPost('ciudad'),
                        'direccion'=> $request->getPost('direccion'),
                        'perfil_id'=> 2];
                        $this->usuarios->update($id_usuario, $data);
                        $data = ['mensaje' => 'Se ha modifica exitosamente.'];
                        return view('plantillas/header').view('plantillas/nav').view('contenido/home_view', $data).view('plantillas/footer');
            }else{
                    $data['validation'] = $this->validator;
                    $data['provincias'] = $this->provincias->where('activo',1)->findAll();
                    $data['usuario'] = $this->usuarios->where('id_usuario',$id_usuario)->first();
                    $data ['titulo'] = 'Modificar Perfil';

                    echo view('plantillas/header', $data);
                    echo view('plantillas/nav');
                    echo view('contenido/Usuarios/ModificarPerfil_view');
                    echo view('plantillas/footer');
            }        
    }

    public function cerrarSesion(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
//FIN INICIA SESIÓN

    public function activarUsuario($id_usuario = null){
            $this->usuarios->update($id_usuario,['activo'=>1]);
            return redirect()->to('tablaUsuariosEliminados');
    }

    public function eliminarUsuario($id_usuario = null){
            $this->usuarios->update($id_usuario,['activo'=>0]);
            return redirect()->to('tablaUsuarios');
    }

}

