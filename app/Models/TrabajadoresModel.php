<?php

namespace App\Models;

use App\Entities\Trabajadores;
use CodeIgniter\Model;

class TrabajadoresModel extends Model
{
    protected $table      = 'Trabajadores';
    protected $primaryKey = 'IdTrabajador';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['IdEmpresa', 'Trabajador', 'NIF', 'Email', 'Activo'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $returnType    = Trabajadores::class;
}