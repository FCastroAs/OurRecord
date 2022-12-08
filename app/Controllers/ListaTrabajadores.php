<?php

namespace App\Controllers;

use App\Entities\Trabajadores;
use App\Models\EmpresasModel;
use App\Models\TrabajadoresModel;

class ListaTrabajadores extends BaseController
{
    public function index()
    {
        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 2)){

            $trabajadoresModel = new TrabajadoresModel();
            $data['trabajadores'] = $trabajadoresModel->where("IdEmpresa", $this->GetUsuarioLogado()->IdEmpresa)->findAll();

            return $this->MuestraVista('lista_trabajadores', $data);
        } else {
            $this->response->redirect("/");
        }
    }
}