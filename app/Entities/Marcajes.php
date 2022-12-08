<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Marcajes extends Entity
{
    public function GetTiempoTotal() : string {
        if ((isset($this->attributes["FechaInicio"])) && (!is_null($this->attributes["FechaInicio"]))){
            $desde = date_create($this->attributes["FechaInicio"]);
            $hasta = date_create();

            if ((isset($this->attributes["FechaFin"])) && (!is_null($this->attributes["FechaFin"]))){
                $hasta = date_create($this->attributes["FechaFin"]);
            }

            $diferencia = date_diff($desde,$hasta);

            $resultado = "";
            if ($diferencia->y > 0) $resultado = " " . $diferencia->y . " años";
            if ($diferencia->m > 0) $resultado .= " " . $diferencia->m . " meses";
            if ($diferencia->d > 0) $resultado .= " " . $diferencia->d . " días";
            if ($diferencia->h > 0) $resultado .= " " . $diferencia->h . " horas";
            if ($diferencia->i > 0) $resultado .= " " . $diferencia->i . " minutos";
            if ($diferencia->s > 0) $resultado .= " " . $diferencia->s . " segundos";

            return trim($resultado);

        } else {
            return "";
        }
    }
}