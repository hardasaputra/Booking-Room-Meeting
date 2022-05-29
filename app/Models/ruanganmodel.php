<?php

namespace App\Models;

use CodeIgniter\Model;

class ruanganmodel extends Model
{

	protected $table                = 'ruangan';
	protected $primaryKey           = 'id_ruangan';
	protected $allowedFields        = ['nama_ruangan', 'gedung'];
	protected $useTimestamps        = true;
}
