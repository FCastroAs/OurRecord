<?php

namespace App\Controllers;

use App\Models\EmpresasModel;
use App\Models\MarcajesModel;

class ListaMarcajes extends BaseController
{
    public function index()
    {
        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 3)){

            $marcajesModel = new MarcajesModel();
            $data['marcajes'] = $marcajesModel->where("IdTrabajador", $this->GetUsuarioLogado()->IdTrabajador) ->findAll();
            $data['idTrabajador'] = $this->GetUsuarioLogado()->IdTrabajador;

            return $this->MuestraVista('lista_marcajes', $data);
        } else {
            $this->response->redirect("/");
        }
    }
}