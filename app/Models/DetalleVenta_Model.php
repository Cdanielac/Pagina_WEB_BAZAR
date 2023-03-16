<?php
namespace App\Models;
use CodeIgniter\Model;


class DetalleVenta_Model extends Model{
	protected $table = 'detalle_venta';
	protected $primaryKey = 'id_detVenta';

	protected $useAutoincrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['id_venta','id_producto','detalle_cantidad', 'detalle_precio','detalle_subtotal','activo'];

	protected $useTimestamps = false;
	protected $createdField = "";
	protected $updatedField = "";
	protected $deletedField = "";
}