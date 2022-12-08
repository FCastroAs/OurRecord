<?php

namespace App\Controllers;

use App\Models\EmpresasModel;

class ListaEmpresas extends BaseController
{
    public function index()
    {
        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 1)){

            $empresasModel = new EmpresasModel();
            $data['empresas'] = $empresasModel->findAll();

            return $this->MuestraVista('lista_empresas', $data);
        } else {
            $this->response->redirect("/");
        }
    }
}