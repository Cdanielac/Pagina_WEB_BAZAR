<?php
namespace App\Models;
use CodeIgniter\Model;

class MedioPago_Model extends Model{
	protected $table = 'mediopago';
	protected $primaryKey = 'id_medioPago';

	protected $useAutoincrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['tipo','activo'];

	protected $useTimestamps = false;
	protected $createdField = "";
	protected $updatedField = "";
	protected $deletedField = "";
}