<?php

namespace App\Controllers;

use App\Entities\Empresas;
use App\Entities\Trabajadores;
use App\Entities\Usuarios;
use App\Models\EmpresasModel;
use App\Models\TrabajadoresModel;
use App\Models\UsuariosModel;

class AltaTrabajador extends BaseController
{
    public function index()
    {
        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 2)){
            return $this->MuestraVista('alta_trabajador');
        } else {
            $this->response->redirect("/");
        }
    }

    public function Guardar(){

        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 2)){
            $data = $this->request->getPost();
            $trabajadoresModel = new TrabajadoresModel();
            $trabajador = new Trabajadores($data);
            $trabajador->IdEmpresa = $this->GetUsuarioLogado()->IdEmpresa;
            if ($trabajadoresModel->save($trabajador)){
                $usuariosModel = new UsuariosModel();
                $usuario = new Usuarios();
                $usuario->IdEmpresa = $this->GetUsuarioLogado()->IdEmpresa;
                $usuario->IdTrabajador = $trabajadoresModel->getInsertID();
                $usuario->Login = $data['Usuario'];
                $usuario = $usuario->EstableceClave($data['Contraseña']);
                $usuario->DebeCambiarPassword = true;
                $usuario->Rol = 3;
                $usuariosModel->save($usuario);

                $this->response->redirect("listaTrabajadores");
            } else {
                $this->response->redirect("/");
            }
        } else {
            $this->response->redirect("/");
        }

    }
}