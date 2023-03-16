<?php
namespace App\Models;
use CodeIgniter\Model;

class Provincia_Model extends Model{
	protected $table = 'provincias';
	protected $primaryKey = 'id_provincia';

	protected $useAutoincrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['nombre', 'activo'];

	protected $useTimestamps = false;
	protected $createdField = "";
	protected $updatedField = "";
	protected $deletedField = "";
}