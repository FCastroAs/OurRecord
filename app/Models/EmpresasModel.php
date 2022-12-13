<?php

namespace App\Models;

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
    protected $returnType    = \App\Entities\Empresas::class;
}