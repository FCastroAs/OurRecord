<?php

namespace App\Controllers;

use App\Entities\Empresas;
use App\Entities\Usuarios;
use App\Models\EmpresasModel;
use App\Models\UsuariosModel;

class AltaEmpresa extends BaseController
{
    public function index()
    {
        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 1)){
            return $this->MuestraVista('alta_empresa');
        } else {
            $this->response->redirect("/");
        }
    }

    public function Guardar(){

        $empresasModel = new EmpresasModel();

        $data = $this->request->getPost();
        $empresa = new Empresas($data);
        if ($empresasModel->save($empresa)){
            $usuariosModel = new UsuariosModel();

            $usuario = new Usuarios();
            $usuario->IdEmpresa = $empresasModel->getInsertID();
            $usuario->Login = $data['Usuario'];
            $usuario = $usuario->EstableceClave($data['Contraseña']);
            $usuario->DebeCambiarPassword = true;
            $usuario->Rol = 2;
            $usuariosModel->save($usuario);

            $this->response->redirect("listaEmpresas");
        } else {
            $this->response->redirect("/");
        }
    }
}