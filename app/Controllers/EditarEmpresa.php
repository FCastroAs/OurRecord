<?php

namespace App\Controllers;

use App\Entities\Empresas;
use App\Entities\Usuarios;
use App\Models\EmpresasModel;
use App\Models\TrabajadoresModel;
use App\Models\UsuariosModel;

class EditarEmpresa extends BaseController
{
    public function index()
    {
        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 1)){
            return $this->MuestraVista('editar_empresa');
        } else {
            $this->response->redirect("/");
        }
    }

    public function MuestraEmpresa($idEmpresa){
        $empresasModel = new EmpresasModel();
        $usuariosModel = new UsuariosModel();
        $trabajadoresModel = new TrabajadoresModel();

        $data['empresa'] = $empresasModel->find($idEmpresa);
        $data['usuario'] = $usuariosModel->where("IdEmpresa", $idEmpresa)->findAll(1)[0];
        $data['trabajadores'] = $trabajadoresModel->where("IdEmpresa", $idEmpresa)->findAll();

        return $this->MuestraVista('editar_empresa', $data);

    }

    public function Guardar(){

        $empresasModel = new EmpresasModel();

        $data = $this->request->getPost();
        $empresa = new Empresas($data);
        if ($empresasModel->save($empresa)){

            if ($data["Contraseña"] != ''){
                $usuariosModel = new UsuariosModel();
                $usuario = $usuariosModel->where("IdEmpresa", $empresa->IdEmpresa)->where("Rol", 2)->findAll(1)[0];
                $usuario = $usuario->EstableceClave($data['Contraseña']);
                $usuario->DebeCambiarPassword = true;
                $usuariosModel->save($usuario);
            }

            $this->response->redirect("listaEmpresas");
        } else {
            $this->response->redirect("/");
        }
    }
}