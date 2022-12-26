<?php

namespace App\Models;

use App\Entities\Usuarios;
use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table      = 'Usuarios';
    protected $primaryKey = 'IdUsuario';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['IdEmpresa', 'IdTrabajador', 'Login', 'Password', 'DebeCambiarPassword', 'Rol'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $returnType    = Usuarios::class;
}