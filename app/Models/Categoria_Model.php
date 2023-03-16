<?php
namespace App\Models;
use CodeIgniter\Model;

class Categoria_Model extends Model{
	protected $table = 'categorias';
	protected $primaryKey = 'id_categoría';

	protected $useAutoincrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['nombre','activo'];

	protected $useTimestamps = true;
	protected $createdField = "fecha_alta";
	protected $updatedField = "fecha_modifica";
	protected $deletedField = "";
}