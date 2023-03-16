<?php
namespace App\Models;
use CodeIgniter\Model;

class Consulta_Model extends Model{
	protected $table = 'consulta';
	protected $primaryKey = 'id_consulta';

	protected $useAutoincrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['nombre','apellido','email', 'motivo', 'texto_consulta','activo','id_perfil'];

	protected $useTimestamps = true;
	protected $createdField = "fecha";
	protected $updatedField = "";
	protected $deletedField = "";
}