<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Categoria_Model;

class Producto_Model extends Model{
	protected $table = 'productos';
	protected $primaryKey = 'id_producto';

	protected $useAutoincrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['cod_producto','categoría','nombre', 'stock', 'precio_unidad', 'disponible','descripcion','img_producto'];

	protected $useTimestamps = true;
	protected $createdField = "fecha_alta";
	protected $updatedField = "fecha_modifica";
	protected $deletedField = "";
}