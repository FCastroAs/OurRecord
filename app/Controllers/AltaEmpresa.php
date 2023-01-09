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

        $usuariosModel = new UsuariosModel();
        if (!$empresa->Valida() || !$this->DataValido($data) ) {
            $this->session->setFlashdata('error', 'Debe cubrir los campos obligatorios de la empresa');
            return $this->MuestraVista('alta_empresa', $data);
        } elseif ($usuariosModel->YaExisteLogin($data['Usuario'])) {
            $this->session->setFlashdata('error', 'Ya existe un usuario con ese login');
            return $this->MuestraVista('alta_empresa', $data);
        } else {
            if ($empresasModel->save($empresa)) {
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

    private function DataValido($data){
        return (isset($data['Usuario']) && ($data['Usuario'] != null) && ($data['Usuario'] != '') && isset($data['Contraseña']) && ($data['Contraseña'] != null) && ($data['Contraseña'] != ''));
    }
}