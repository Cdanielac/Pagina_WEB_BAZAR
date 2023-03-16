<?php

namespace App\Controllers;
use App\Models\Usuario_Model;
use App\Models\Producto_Model;
use App\Models\Categoria_Model;
use App\Models\Consulta_Model;
use App\Models\Provincia_Model;
use App\Models\Venta_Model;
use App\Models\DetalleVenta_Model;
use App\Models\MedioPago_Model;
use App\Controllers\BaseController;

class Admin_controller extends BaseController
{
protected $usuarios, $productos, $categorias, $consultas, $provincias, $ventas, $detalleVentas, $mediopagos;
protected $reglas, $reglasEditar;
    
    public function __construct(){
         $this->usuarios = new Usuario_Model();
         $this->productos = new Producto_Model();
         $this->consultas = new Consulta_Model();
         $this->categorias = new Categoria_Model();
         $this->provincias = new Provincia_Model();
         $this->ventas = new Venta_Model();
         $this->detalleVentas = new DetalleVenta_Model();
         $this->mediopagos = new MedioPago_Model();

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

    public function admin(){
        $data['titulo'] = 'Inicio';

        return view('plantillas/header',$data).view('plantillas/nav').view('contenido/home_view').view('plantillas/footer');
    }

    public function modificarPerfil(){
        $request = \Config\Services::request();
        $id_usuario = $request->getPost('id_usuario');
        $data['provincias'] = $this->provincias->where('activo',1)->findAll();
        $data['usuario'] = $this->usuarios->where('id_usuario',$id_usuario)->first();
        $data ['titulo'] = 'Modificar Perfil';

        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('contenido/Usuarios/ModificarPerfilAdmin_view');
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
                        'perfil_id'=> 1];
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
                    echo view('contenido/Usuarios/ModificarPerfilAdmin_view');
                    echo view('plantillas/footer');
            }        
    }

    public function verUsuarios($activo=1){
        $usuarios = $this->usuarios->where('activo',$activo)->findAll();
        $provincias = $this->provincias->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios, 'provincias' => $provincias];

        echo view('plantillas/header');
        echo view('plantillas/nav');
        echo view('contenido/Usuarios/TablaUsuarios_view', $data);
        echo view('plantillas/footer');
    }

    public function usuariosEliminados($activo=0){
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $provincias = $this->provincias->where('activo',1)->findAll();
        $data = ['titulo' => 'Usuarios Eliminados', 'datos' => $usuarios, 'provincias' => $provincias];
        
            echo view('plantillas/header');
            echo view('plantillas/nav');
            echo view('contenido/Usuarios/TablaUsuariosEliminados_view', $data);
            echo view('plantillas/footer');
    }

    public function verProductos($disponible = 1){
        $productos = $this->productos->where('disponible', $disponible)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $data = ['titulo' => 'Productos', 'datos' => $productos, 'categorias' => $categorias];
            echo view('plantillas/header');
            echo view('plantillas/nav');
            echo view('contenido/TablaProductos_view', $data);
            echo view('plantillas/footer');
    }

    public function productosEliminados($disponible = 0){
        $productos = $this->productos->where('disponible', $disponible)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $data = ['titulo' => 'Productos Eliminados', 'datos' => $productos, 'categorias' => $categorias];
        
            echo view('plantillas/header');
            echo view('plantillas/nav');
            echo view('contenido/TablaProductosEliminados_view', $data);
            echo view('plantillas/footer');
    }

    public function verConsultas($activo=1){
        $consultas = $this->consultas->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Consultas', 'datos' => $consultas];

        echo view('plantillas/header');
        echo view('plantillas/nav');
        echo view('contenido/TablaConsultas_view', $data);
        echo view('plantillas/footer');
    }

    public function consultasEliminados($activo = 0){
        $consultas = $this->consultas->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Consultas Eliminadas', 'datos' => $consultas];
        
            echo view('plantillas/header');
            echo view('plantillas/nav');
            echo view('contenido/TablaConsultasEliminados_view', $data);
            echo view('plantillas/footer');
    }

    public function verVentas($activo=1){
        $ventas = $this->ventas->where('activo',$activo)->findAll();
        $usuarios = $this->usuarios->where('activo',$activo)->findAll();
        $mediopagos = $this->mediopagos->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Ventas', 'ventas' => $ventas, 'usuarios' => $usuarios, 'mediopagos' => $mediopagos];

        echo view('plantillas/header');
        echo view('plantillas/nav');
        echo view('contenido/TablaVentas_view', $data);
        echo view('plantillas/footer');
    }

    public function ventasEliminados($activo=0){
        $ventas = $this->ventas->where('activo',$activo)->findAll();
        $usuarios = $this->usuarios->where('activo',1)->findAll();
        $mediopagos = $this->mediopagos->where('activo',1)->findAll();
        $data = ['titulo' => 'Ventas Eliminadas', 'ventas' => $ventas, 'usuarios' => $usuarios, 'mediopagos' => $mediopagos];

        echo view('plantillas/header');
        echo view('plantillas/nav');
        echo view('contenido/TablaVentasEliminados_view', $data);
        echo view('plantillas/footer');
    }

    public function verDetalle(){
        $request =\Config\Services::request();
        $idVenta = $request->getPost('id_venta');
        $detalles = $this->detalleVentas->where('id_venta',$idVenta)->findAll();
        $productos = $this->productos->where('disponible', 1)->findAll();
        $data = ['titulo' => 'Detalle de Venta', 'detalles' => $detalles, 'productos' => $productos, 'idVenta' => $idVenta];
        return view('plantillas/header').view('plantillas/nav').view('contenido/detalle_view', $data).view('plantillas/footer');
    }

}   
