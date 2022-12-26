<?php

namespace App\Models;

use App\Entities\Marcajes;
use CodeIgniter\Model;

class MarcajesModel extends Model
{
    protected $table      = 'Marcajes';
    protected $primaryKey = 'IdMarcaje';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['IdEmpresa', 'IdTrabajador', 'FechaInicio', 'FechaFin'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $returnType    = Marcajes::class;
}