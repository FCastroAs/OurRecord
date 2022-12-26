<?php

namespace App\Models;

use App\Entities\Empresas;
use CodeIgniter\Model;

class EmpresasModel extends Model
{
    protected $table      = 'Empresas';
    protected $primaryKey = 'IdEmpresa';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Empresa', 'CIF', 'Email', 'Activo'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $returnType    = Empresas::class;
}