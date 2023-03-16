<?php

namespace App\Controllers;
use App\Models\Producto_Model;
use App\Models\Categoria_Model;

class Producto_controller extends BaseController
{
    protected $productos;
    protected $reglas, $reglasImagen, $reglasEditar;

    public function __construct(){
        $this->productos = new Producto_Model();
        $this->categorias = new Categoria_Model();
            helper(['form']);

            $this->reglas = [
                'cod_producto' => [
                    'rules'=> 'required|is_unique[productos.cod_producto]',
                    'errors'=> [
                        'required' => 'El código de producto es obligatorio.',
                        'is_unique' =>'Ya existe producto con el mismo código.'
                    ]
                ],
                'categoria' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo {field} es obligatorio.'              
                    ]
                ],
                'nombre' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'stock' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo {field} es obligatorio.', 
                    ]
                ],
                'precio_unidad' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo Precio por unidad es obligatorio.'
                    ]
                ],
                'descripcion' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ]
            ];

            $this->reglasImagen =[
                'img_producto' => [
                    'rules'=> 'uploaded[img_producto]|is_image[img_producto]',
                    'errors'=> [
                        'uploaded' => 'Debe cargar una imagen para el producto',
                        'is_image' => 'El archivo seleccionado no corresponde al tipo imagen'
                    ]
                ]       
            ];
            
            $this->reglasEditar = [
                'categoria' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo {field} es obligatorio.'              
                    ]
                ],
                'nombre' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'stock' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo {field} es obligatorio.', 
                    ]
                ],
                'precio_unidad' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo Precio por unidad es obligatorio.'
                    ]
                ],
                'descripcion' => [
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ]
            ];        
    }

    public function verCatalogo($disponible = 1){
        $productos = $this->productos->where('disponible', $disponible)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();
        
        $data = ['titulo' => 'Cátalogo de Productos', 'datos' => $productos, 'categorias' => $categorias];
            echo view('plantillas/header');
            echo view('plantillas/nav');
            echo view('contenido/catalogoProductos', $data);
            echo view('plantillas/footer');
    }

    public function nuevoProducto(){
        $categorias = $this->categorias->where('activo',1)->findAll();
        $data = ['titulo' => 'Agregar Producto', 'categorias' => $categorias];

         return view ('plantillas/header').view('plantillas/nav').view('contenido/NuevoProducto_view',$data).view('plantillas/footer');
    }

    public function registrarProducto()
        {
            $request = \Config\Services::request();
            $validaImagen = $this->validate($this->reglasImagen);
            $validation = $this->validate($this->reglas);
                if ($validation && $validaImagen ){

                    $img = $this->request->getFile('img_producto');
                    $nombreImagen = $img->getRandomName();
                    $img->move('public/img/productos',$nombreImagen.'.png');

                    $categoria = $request->getPost('categoria'); 
                    
                    $data=[
                        'cod_producto'=> $request->getPost('cod_producto'),
                        'nombre'=> $request->getPost('nombre'),
                        'categoría'=> $categoria,
                        'stock'=> $request->getPost('stock'),
                        'precio_unidad'=> $request->getPost('precio_unidad'),
                        'descripcion'=> $request->getPost('descripcion'),
                        'img_producto' => $img->getName()];

                        $productos = new Producto_Model();
                        $productos->insert($data);
                        $productos = $this->productos->where('disponible',1)->findAll();
                        $categorias = $this->categorias->where('activo',1)->findAll();
                        $data = ['titulo'=> 'Productos','mensaje'=> 'Registro exitoso.','datos'=> $productos,'categorias'=> $categorias];
                        return view('plantillas/header', $data).view('plantillas/nav').view('contenido/TablaProductos_view').view ('plantillas/footer');
                       
                }else{
                    $data['validation'] = $this->validator;
                    $data['validaImagen'] = $this->validator;
                }

            $data['titulo'] = 'Productos';
            $categorias = new Categoria_Model();
            $data ['categorias'] = $categorias->findAll();
            return view('plantillas/header', $data).view('plantillas/nav').view('contenido/NuevoProducto_view').view ('plantillas/footer');
        }

    public function editarProducto(){
        $request = \Config\Services::request();
        $id_producto = $request->getPost('id_producto');
        $data['categorias'] = $this->categorias->where('activo',1)->findAll();
        $data['producto'] = $this->productos->where('id_producto',$id_producto)->first();
        $data ['titulo'] = 'Editar Producto';

        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('contenido/EditarProducto_view');
        echo view('plantillas/footer');
    }

    public function actualizarProducto(){
        $request = \Config\Services::request();
        $id_producto = $request->getPost('id_producto');
        $validation = $this->validate($this->reglasEditar);
        $producto = $this->productos->where('id_producto',$id_producto)->first();
        
            if ($validation){
                    $categoria = $request->getPost('categoria'); 
                    $data=[
                        'nombre'=> $request->getPost('nombre'),
                        'categoría'=> $categoria,
                        'stock'=> $request->getPost('stock'),
                        'precio_unidad'=> $request->getPost('precio_unidad'),
                        'descripcion'=> $request->getPost('descripcion')];
                        $this->productos->update($id_producto, $data);

                        $validaImagen = $this->validate($this->reglasImagen);
                        $img = $request->getFile('img_producto');

                        if($validaImagen){
                            $imgActual = $producto['img_producto'];
                            $ruta_img ="public/img/productos/".$imgActual;
                            if (file_exists($ruta_img)){
                                unlink($ruta_img);
                            }
                            $nombreImagen = $img->getRandomName();
                            $img->move('public/img/productos',$nombreImagen.'.png');
                            $data = ['img_producto' => $img->getName()];
                            $this->productos->update($id_producto, $data);
                        }
                        $productos = $this->productos->where('disponible',1)->findAll();
                        $categorias = $this->categorias->where('activo',1)->findAll();
                        $data = ['titulo'=> 'Productos','mensaje'=> 'Modificación exitosa.','datos'=> $productos,'categorias'=> $categorias];
                        return view('plantillas/header', $data).view('plantillas/nav').view('contenido/TablaProductos_view').view ('plantillas/footer');
                       
            }else{
                    $data['validation'] = $this->validator;
                    $data['categorias'] = $this->categorias->where('activo',1)->findAll();
                    $data['producto'] = $this->productos->where('id_producto',$id_producto)->first();
                    $data ['titulo'] = 'Editar Producto';

                    echo view('plantillas/header', $data);
                    echo view('plantillas/nav');
                    echo view('contenido/EditarProducto_view');
                    echo view('plantillas/footer');
            }        
    
    }

    public function buscarPorCategoria(){
        $request = \Config\Services::request();
        $idCategoria = $request->getPost('idCategoria'); 
        $categorias = $this->categorias->where('activo', 1)->findAll();       
        $data['categoria'] = null;
        foreach ($categorias as $categoria){
            
            if ($categoria['id_categoría'] == $idCategoria){
                $data['categoria'] = $this->categorias->where('id_categoría',$idCategoria )->first();
                }
        } 
        if ($data['categoria'] != null){
            $data['titulo'] = 'Productos';
            $data['datos'] = $this->productos->where('disponible', 1)->findAll();
                echo view('plantillas/header', $data);
                echo view('plantillas/nav');
                echo view('contenido/ProductosPorCategoria_view');
                echo view('plantillas/footer');
        }else {
            $productos = $this->productos->where('disponible', 1)->findAll();
            $data = ['titulo' => 'Cátalogo de Productos', 'datos' => $productos,'categorias' => $categorias, 'mensaje' => 'No se encontraron productos para esa categoría.'];
            return view('plantillas/header').view('plantillas/nav').view('contenido/catalogoProductos', $data).view('plantillas/footer');
        }
    }     

    public function activarProducto($id_producto = null){
            $this->productos->update($id_producto,['disponible'=>1]);
            return redirect()->to('tablaProductosEliminados');
    }

    public function eliminarProducto($id_producto = null){
            $this->productos->update($id_producto,['disponible'=>0]);
            return redirect()->to('tablaProductos');
    }

}
