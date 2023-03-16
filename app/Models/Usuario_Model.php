<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuario_Model extends Model{
	protected $table = 'usuarios';
	protected $primaryKey = 'id_usuario';

	protected $useAutoincrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['nombre','apellido','email', 'usuario', 'contraseña','telefono','id_provincia','ciudad','direccion','activo','perfil_id',];

	protected $useTimestamps = true;
	protected $createdField = "fecha_alta";
	protected $updatedField = "fecha_modifica";
	protected $deletedField = "";
}