<?php

namespace App\Controllers;
use App\Models\Consulta_Model;

class Consulta_controller extends BaseController
{
protected $consultas;
protected $reglas;
    public function __construct(){
        $this->userConsulta = new Consulta_Model();
    }

    public function registrar_consulta()
    {
    $request =\Config\Services::request();
    $db = \Config\Database::connect();
        $rules = [
            'nombre' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo Nombre es obligatorio.'
                ]
            ],
            'apellido' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo Apellido es obligatorio.'
                ]
            ],
            'email' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'              
                ]
            ],
            'motivo' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'               
                ]
            ],
            'texto_consulta' => [
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo consulta es obligatorio.'
                ]
            ] 
        ];
            $validations = $this->validate($rules);
            if ($validations){
                $data=[
                    'nombre'=> $request->getPost('nombre'),
                    'apellido'=> $request->getPost('apellido'),
                    'email'=> $request->getPost('email'),
                    'motivo'=> $request->getPost('motivo'),
                    'texto_consulta'=> $request->getPost('texto_consulta'),
                    'id_perfil' =>3];


                    $userConsulta = new Consulta_Model();
                    $userConsulta->insert($data);
                    $data['mensaje'] = 'Su consulta ha sido enviada con éxito. Le responderemos a la brevedad.';
            }else{
                $data['validation'] = $this->validator;
            }

        $data['titulo'] = 'Contacto';
        return view('plantillas/header', $data).view('plantillas/nav').view('contenido/contacto_view').view ('plantillas/footer');
    }

    public function eliminarConsulta($id_producto = null){
            $this->userConsulta->update($id_producto,['activo' =>0]);
            return redirect()->to('tablaConsultas');
    }

    public function activarConsulta($id_producto = null){
            $this->userConsulta->update($id_producto,['activo' =>1]);
            return redirect()->to('tablaConsultas');
    }

}

