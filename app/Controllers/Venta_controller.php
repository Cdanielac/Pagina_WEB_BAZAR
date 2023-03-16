<?php
namespace App\Controllers;
use App\Models\Usuario_Model;
use App\Models\Provincia_Model;
use App\Models\Producto_Model;
use App\Models\Categoria_Model;
use App\Models\DetalleVenta_Model;
use App\Models\Venta_Model;
use App\Models\MedioPago_Model;

class Venta_controller extends BaseController
{
    protected $productos, $usuarios, $detalleVenta, $ventas;
    protected $reglas, $reglasTc, $reglasTd;

    public function __construct(){
        $this->productos = new Producto_Model();
        $this->categorias = new Categoria_Model();
        $this->usuarios = new Usuario_Model();
        $this->provincias = new Provincia_Model();
        $this->detalleVentas = new DetalleVenta_Model();
        $this->ventas = new Venta_Model();
        $this->mediopagos = new MedioPago_Model();
            helper(['form']);

        $this->reglas = [ //reglas para finalizar Compra
            'telefono' =>[
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'provincia' =>[
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'ciudad' =>[
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'direccion' =>[
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'fpago' =>[
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'Debe seleccionar un Medio de Pago.'
                ]
            ]
        ];

        $this->reglasTc = [ //reglas para compra con Tarjeta de Credito
            'tarjeta' =>[
                'rules'=> 'required|max_length[16]|min_length[16]',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.',
                    'max_length' => 'El n° de la tarjeta solo puede contener 16 dígitos.',
                    'min_length' => 'El n° de la tarjeta debe contener 16 dígitos.'
                ]
            ],
            'digitoSeguridad' =>[
                'rules'=> 'required|max_length[3]|min_length[3]',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.',
                    'max_length' => 'El código de seguridad de la tarjeta solo puede contener 3 dígitos.',
                    'min_length' => 'El código de seguridad  de la tarjeta debe contener 3 dígitos.'
                ]
            ],
            'cuotas' =>[
                'rules'=> 'required',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]
        ];
        $this->reglasTd = [ //reglas para compra con Tarjeta de Debito
            'tarjeta' =>[
                'rules'=> 'required|max_length[16]|min_length[16]',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.',
                    'max_length' => 'El n° de la tarjeta solo puede contener 16 dígitos.',
                    'min_length' => 'El n° de la tarjeta debe contener 16 dígitos.'
                ]
            ],
            'digitoSeguridad' =>[
                'rules'=> 'required|max_length[3]|min_length[3]',
                'errors'=> [
                    'required' => 'El campo {field} es obligatorio.',
                    'max_length' => 'El código de seguridad de la tarjeta solo puede contener 3 dígitos.',
                    'min_length' => 'El código de seguridad de la tarjeta debe contener 3 dígitos.'
                ]
            ]
        ];
    }

    public function verFinalizarCompra(){
        $cart = \Config\Services::cart();
        $idUsuario_sesion;
        $idUsuario_sesion = session('id_usuario');
        $usuario = $this->usuarios->where('id_usuario', $idUsuario_sesion)->first();
        $data['productos'] = new Producto_Model();
        $data['usuario'] = $usuario;
        $data['provincias'] = $this->provincias->where('activo',1)->findAll();
        $data['titulo'] = 'Finalizar Compra';
        echo view('plantillas/header');
        echo view('plantillas/nav');
        echo view('contenido/FinalizarCompra_view',$data);
        echo view('plantillas/footer');
    }

    public function elegirMedioPago(){
        $request =\Config\Services::request();
        $id_usuario = $request->getPost('id_usuario');
        $cart = \Config\Services::cart();
        $compra = true;

        foreach($cart->contents() as $elem){ //controla stock
            $producto = $this->productos->where('id_producto',$elem['id'])->first();
            if ($producto['stock'] < $elem['qty']) {
                $compra = false;
            }
        }

        if($compra == true){ 
            if($this->validate($this->reglas)){
                $data=[
                    'telefono'=> $request->getPost('telefono'),
                    'id_provincia'=> $request->getPost('provincia'),
                    'ciudad'=> $request->getPost('ciudad'),
                    'direccion'=> $request->getPost('direccion')];
                $this->usuarios->update($id_usuario, $data);
                $data ['value']= $request->getPost('fpago');
                echo view('plantillas/header');
                echo view('plantillas/nav');
                echo view('contenido/MedioPago_view',$data);
                echo view('plantillas/footer');
            }else{
                $data['validation'] = $this->validator;
                $idUsuario_sesion;
                $idUsuario_sesion = session('id_usuario');
                $usuario = $this->usuarios->where('id_usuario', $idUsuario_sesion)->first();
                $data['productos'] = new Producto_Model();
                $data['usuario'] = $usuario;
                $data['provincias'] = $this->provincias->where('activo',1)->findAll();
                $data['titulo'] = 'Finalizar Compra';
                echo view('plantillas/header');
                echo view('plantillas/nav');
                echo view('contenido/FinalizarCompra_view',$data);
                echo view('plantillas/footer');
            }
        }else{
                $cart = \Config\Services::cart();
                $idUsuario_sesion;
                $idUsuario_sesion = session('id_usuario');
                $usuario = $this->usuarios->where('id_usuario', $idUsuario_sesion)->first();
                $data['productos'] = new Producto_Model();
                $data['usuario'] = $usuario;
                $data['provincias'] = $this->provincias->where('activo',1)->findAll();
                $data['titulo'] = 'Finalizar Compra';
                $data['mensaje'] = 'No se pudo finalizar la compra. La cantidad de uno/varios productos supera el stock. Por favor revise su carrito de compra y vuelva a intentar nuevamente.';
                echo view('plantillas/header');
                echo view('plantillas/nav');
                echo view('contenido/FinalizarCompra_view',$data);
                echo view('plantillas/footer');
        }    
    }   


    public function generarFacturaEf(){ //factura pago en efectivo 
        $cart = \Config\Services::cart();
        $request =\Config\Services::request(); 
        $value= $request->getPost('value');
            
            $idUsuario_sesion = session('id_usuario');

            $datoVenta = ['id_cliente' => $idUsuario_sesion,
                        'id_medioPago' => 1];
            $ventaId = $this->ventas->insert($datoVenta);

            $total = 0;
            foreach ($cart->contents() as $dato){
                $total = $total + $dato['subtotal'];
                $datoDV=[
                    'id_venta' => $ventaId,
                    'id_producto' => $dato['id'],
                    'detalle_cantidad' => $dato['qty'],
                    'detalle_precio' => $dato['price'],
                    'detalle_subtotal' => $dato['subtotal']];

                    $data['detalleVenta'] = $this->detalleVentas->insert($datoDV);//inserta detalle venta

                    $id_producto = $dato['id']; //descontar stock
                    $producto = $this->productos->where('id_producto', $id_producto)->first();
                    $stock = ['stock' => $producto['stock'] - $dato['qty']];
                    $this->productos->update($id_producto, $stock);
            }
            //actualiza total venta
            $ventaTotal['total'] = $total;
            $this->ventas->update($ventaId, $ventaTotal);

            //data para Factura 
            $data['usuario'] = $this->usuarios->where('id_usuario', $idUsuario_sesion)->first();
            $data['mediopagos'] = $this->mediopagos->where('activo', 1)->findAll();
            $data['provincias'] = $this->provincias->where('activo', 1)->findAll();
            $data['venta'] = $this->ventas->where('id_venta', $ventaId)->first();
            //$data['detalleVenta'] = $this->detalleVenta->where('id_venta', $ventaId)->first();
            $data['titulo'] = 'Factura de Compra';
            echo view('plantillas/header');
            echo view('plantillas/nav');
            echo view('contenido/Factura_view',$data);
            echo view('plantillas/footer');
            $cart->destroy();
        
    }


    public function generarFacturaTC(){ //tarjeta de credito
        $cart = \Config\Services::cart();
        $request =\Config\Services::request(); 
        $detalleVenta = new DetalleVenta_Model();
        $venta= new Venta_Model();
        $value= $request->getPost('value');
        $validaTc = $this->validate($this->reglasTc);

        if($validaTc){
                $idUsuario_sesion = session('id_usuario');

                $datoVenta = ['id_cliente' => $idUsuario_sesion,
                            'id_medioPago' => 2];
                $ventaId = $this->ventas->insert($datoVenta);

                $total = 0;
                foreach ($cart->contents() as $dato){
                    $total = $total + $dato['subtotal'];
                    $datoDV=[
                        'id_venta' => $ventaId,
                        'id_producto' => $dato['id'],
                        'detalle_cantidad' => $dato['qty'],
                        'detalle_precio' => $dato['price'],
                        'detalle_subtotal' => $dato['subtotal']];

                        $data['detalleVenta'] = $this->detalleVentas->insert($datoDV);//inserta detalle venta

                        $id_producto = $dato['id']; //descontar stock
                        $producto = $this->productos->where('id_producto', $id_producto)->first();
                        $stock = ['stock' => $producto['stock'] - $dato['qty']];
                        $this->productos->update($id_producto, $stock);
                }//cierra Foreach
                //actualiza total venta
                $ventaTotal['total'] = $total;
                $this->ventas->update($ventaId, $ventaTotal);

                //data para Factura 
                $data['usuario'] = $this->usuarios->where('id_usuario', $idUsuario_sesion)->first();
                $data['mediopagos'] = $this->mediopagos->where('activo', 1)->findAll();
                $data['provincias'] = $this->provincias->where('activo', 1)->findAll();
                $data['venta'] = $this->ventas->where('id_venta', $ventaId)->first();
                //$data['detalleVenta'] = $this->detalleVenta->where('id_venta', $ventaId)->first();
                $data['titulo'] = 'Factura de Compra';
                echo view('plantillas/header');
                echo view('plantillas/nav');
                echo view('contenido/Factura_view',$data);
                echo view('plantillas/footer');
                $cart->destroy();

        }else{ //NO CUMPLE CON LOS CAMPOS DE TC
            $data['validation'] = $this->validator;
            $data ['value'] = 2;
            echo view('plantillas/header');
            echo view('plantillas/nav');
            echo view('contenido/MedioPago_view',$data);
            echo view('plantillas/footer');
        }
    }


    public function generarFacturaTD(){ //tarjeta de debito
        $cart = \Config\Services::cart();
        $request =\Config\Services::request(); 
        $detalleVenta = new DetalleVenta_Model();
        $venta= new Venta_Model();
        $value= $request->getPost('value');
        $validaTd = $this->validate($this->reglasTd);

        if($validaTd){
                $idUsuario_sesion = session('id_usuario');

                $datoVenta = ['id_cliente' => $idUsuario_sesion,
                            'id_medioPago' => 3];
                $ventaId = $this->ventas->insert($datoVenta);

                $total = 0;
                foreach ($cart->contents() as $dato){
                    $total = $total + $dato['subtotal'];
                    $datoDV=[
                        'id_venta' => $ventaId,
                        'id_producto' => $dato['id'],
                        'detalle_cantidad' => $dato['qty'],
                        'detalle_precio' => $dato['price'],
                        'detalle_subtotal' => $dato['subtotal']];

                        $data['detalleVenta'] = $this->detalleVentas->insert($datoDV);//inserta detalle venta

                        $id_producto = $dato['id']; //descontar stock
                        $producto = $this->productos->where('id_producto', $id_producto)->first();
                        $stock = ['stock' => $producto['stock'] - $dato['qty']];
                        $this->productos->update($id_producto, $stock);
                }//cierra Foreach
                //actualiza total venta
                $ventaTotal['total'] = $total;
                $this->ventas->update($ventaId, $ventaTotal);

                //data para Factura 
                $data['usuario'] = $this->usuarios->where('id_usuario', $idUsuario_sesion)->first();
                $data['mediopagos'] = $this->mediopagos->where('activo', 1)->findAll();
                $data['provincias'] = $this->provincias->where('activo', 1)->findAll();
                $data['venta'] = $this->ventas->where('id_venta', $ventaId)->first();
                //$data['detalleVenta'] = $this->detalleVenta->where('id_venta', $ventaId)->first();
                $data['titulo'] = 'Factura de Compra';
                echo view('plantillas/header');
                echo view('plantillas/nav');
                echo view('contenido/Factura_view',$data);
                echo view('plantillas/footer');
                $cart->destroy();

        }else{ //NO CUMLE CON LOS CAMPOS DE TD
            $data['validation'] = $this->validator;
            $data ['value'] = 3;
            echo view('plantillas/header');
            echo view('plantillas/nav');
            echo view('contenido/MedioPago_view',$data);
            echo view('plantillas/footer'); 
        }
    }

    public function activarVenta($id_venta = null){
        $this->ventas->update($id_venta,['activo'=>1]);
        return redirect()->to('tablaVentasEliminados');
    }

    public function eliminarVenta($id_venta = null){
        $this->ventas->update($id_venta,['activo'=>0]);
        return redirect()->to('tablaVentas');
    }
}    
