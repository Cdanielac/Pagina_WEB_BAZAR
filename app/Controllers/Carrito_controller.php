<?php
namespace App\Controllers;
use App\Models\Producto_Model;
use App\Models\Categoria_Model;
use App\Models\DetalleVenta_Model;

class Carrito_controller extends BaseController
{
	protected $productos, $categorias;

	public function verCarrito(){
		$cart = \Config\Services::cart();
        $data = ['titulo' => 'Lista de Productos', 'datos' => 'carrito'];
            echo view('plantillas/header');
            echo view('plantillas/nav');
            echo view('contenido/TablaCarritoCompra_view', $data);
            echo view('plantillas/footer');
	}

	public function agregarItem(){
		$cart = \Config\Services::cart();
		$request = \Config\Services::request();
		$productos = new Producto_Model;
		$id_producto;
		$id_producto = $request->getPost('id_producto');
		//$producto = $productos->where('id_producto', $id_producto)->first();
		$cart->insert(array(
	   'id'      => $id_producto,
	   'qty'     => 1,
	   'price'   => $request->getPost('precio_unidad'),
	   'name'    => $request->getPost('nombre'),
	   //'options' => array('Size' => 'L', 'Color' => 'Red')
		));
		//$data = ['stock' => $producto['stock'] - 1];
        //$productos->update($id_producto, $data);
        return redirect()->to('catalogoProductos');
	}

	public function actualizarCarrito(){
		$data=[
                'id_producto' => $dato['id'],
				'detalle_cantidad' => $dato['qty'],
				'detalle_precio' => $dato['price'],
				'detalle_subtotal' => $dato['subtotal']];
				echo $data; die;
		$cart = \Config\Services::cart();
		$request = \Config\Services::request();
		$cart->insert(array(
		'rowid' => $request->getPost('rowid'),
		'id'      => $request->getPost('id_producto'),
	    'qty'     => 1,
	    'price'   => $request->getPost('precio_unidad'),
	    'name'    => $request->getPost('nombre'),
	   //'options' => array('Size' => 'L', 'Color' => 'Red')
		));
		return redirect()->route('carrito');
	}

	public function eliminarItem($rowid = null){
		$cart = \Config\Services::cart();
		$cart->remove($rowid,'rowid');
		return redirect()->route('carrito');
	}
	public function vaciarCarrito(){
		$cart = \Config\Services::cart();
		$cart->destroy();
		return redirect()->route('carrito');
	}
	

}
