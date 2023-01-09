<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Empresas extends Entity
{
    public function Valida(): bool
    {
        return ($this->attributes['Empresa'] != null) &&
            ($this->attributes['Empresa'] != '') &&
            ($this->attributes['CIF'] != null) &&
            ($this->attributes['CIF'] != '') &&
            ($this->attributes['Email'] != null) &&
            ($this->attributes['Email'] != '');
    }
}