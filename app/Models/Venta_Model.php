<?php
namespace App\Models;
use CodeIgniter\Model;


class Venta_Model extends Model{
	protected $table = 'ventas';
	protected $primaryKey = 'id_venta';

	protected $useAutoincrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['id_cliente','id_medioPago','total','activo'];

	protected $useTimestamps = true;
	protected $createdField = "fecha_venta";
	protected $updatedField = "";
	protected $deletedField = "";
}