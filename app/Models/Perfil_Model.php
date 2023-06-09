<?php
namespace App\Models;
use CodeIgniter\Model;

class Perfil_Model extends Models{
	protected $table = 'perfil';
	protected $primaryKey = 'id_perfil';

	protected $useAutoincrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['nombre','activo'];

	protected $useTimestamps = true;
	protected $createdField = "fecha_alta";
	protected $updatedField = "fecha_modifica";
	protected $deletedField = "";
}