<?php

namespace App\Models;

use CodeIgniter\Model;

class adminmodel extends Model
{
	//protected $DBGroup              = 'default';
	protected $table                = 'admin';
	protected $primaryKey           = 'id_admin';
	// protected $useAutoIncrement     = true;
	// protected $insertID             = 0;
	// protected $returnType           = 'array';
	// protected $useSoftDelete        = false;
	// protected $protectFields        = true;
	protected $allowedFields        = ['email_admin', 'nama_admin', 'password', 'divisi', 'jabatan_admin'];

	// // Dates
	protected $useTimestamps        = true;
	// protected $dateFormat           = 'datetime';
	// protected $createdField         = 'created_at';
	// protected $updatedField         = 'updated_at';
	// //protected $deletedField         = 'deleted_at';

	// // Validation
	// protected $validationRules      = [];
	// protected $validationMessages   = [];
	// protected $skipValidation       = false;
	// protected $cleanValidationRules = true;

	// // Callbacks
	// protected $allowCallbacks       = true;
	// protected $beforeInsert         = [];
	// protected $afterInsert          = [];
	// protected $beforeUpdate         = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $afterFind            = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];
}
