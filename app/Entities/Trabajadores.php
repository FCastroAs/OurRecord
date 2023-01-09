<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Trabajadores extends Entity
{
    public function Valida(): bool
    {
        return ($this->attributes['Trabajador'] != null) &&
            ($this->attributes['Trabajador'] != '') &&
            ($this->attributes['NIF'] != null) &&
            ($this->attributes['NIF'] != '') &&
            ($this->attributes['Email'] != null) &&
            ($this->attributes['Email'] != '');
    }
}