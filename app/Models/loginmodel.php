<?php

namespace App\Models;

use CodeIgniter\Model;

class loginmodel extends Model
{
    protected $table                = 'admin';
    protected $primaryKey           = 'id_admin';
    protected $allowedFields        = ['nama_admin', 'password', 'divisi', 'jabatan_admin'];
    protected $useTimestamps        = true;
}
