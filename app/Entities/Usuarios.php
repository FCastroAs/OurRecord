<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Usuarios extends Entity
{
    public function ClaveCorrecta(string $clave): bool
    {
        return (password_verify($clave, $this->attributes['Password']));
    }

    public function EstableceClave(string $clave): Usuarios
    {
        $passEncriptado = password_hash($clave, PASSWORD_BCRYPT);
        $this->attributes['Password'] = $passEncriptado;
        return $this;
    }

    public function PaginaPrincipal(): string
    {
        if ($this->attributes['DebeCambiarPassword']){
            return "cambioContraseña";
        }

        switch ($this->attributes['Rol']) {
            case 1:
                return "/listaEmpresas";
            case 2:
                return "/listaTrabajadores";
            case 3:
                return "/marcaje";
            default:
                return "/";
        }
    }
}