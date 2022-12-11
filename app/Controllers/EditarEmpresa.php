<?php

namespace App\Controllers;

use App\Entities\Empresas;
use App\Entities\Marcajes;
use App\Entities\Usuarios;
use App\Models\EmpresasModel;
use App\Models\MarcajesModel;
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

        $usuarios = $usuariosModel->where("IdEmpresa", $idEmpresa)->findAll(1);
        if (count($usuarios) == 1){
            $data['usuario'] = $usuarios[0];
        } else {
            $usuario = new Usuarios();
            $usuario->Login = "Desactivado";
            $data['usuario'] = $usuario;
        }
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
                $usuarios = $usuariosModel->where("IdEmpresa", $empresa->IdEmpresa)->where("Rol", 2)->findAll(1);
                if (count($usuarios) == 1){
                    $usuario = $usuarios[0];
                    $usuario = $usuario->EstableceClave($data['Contraseña']);
                    $usuario->DebeCambiarPassword = true;
                    $usuariosModel->save($usuario);
                }
            }

            $this->response->redirect("listaEmpresas");
        } else {
            $this->response->redirect("/");
        }
    }

    public function Eliminar($idEmpresa){

        $trabajadoresModel = new TrabajadoresModel();
        $empresasModel = new EmpresasModel();
        $usuariosModel = new UsuariosModel();

        $trabajadores = $trabajadoresModel->where("IdEmpresa", $idEmpresa)->findAll();
        foreach ($trabajadores as $trabajador) {
            unset($trabajador->Activo);
            $trabajador->Activo = false;
            $trabajadoresModel->update($trabajador->IdTrabajador, $trabajador);
        }

        $usuarios = $usuariosModel->where("IdEmpresa", $idEmpresa)->findAll();
        foreach ($usuarios as $usuario) {
            $usuariosModel->delete($usuario->IdUsuario);
        }

        $empresa = $empresasModel->find($idEmpresa);
        unset($empresa->Activo);
        $empresa->Activo = false;
        $empresasModel->save($empresa);

        $this->response->redirect("/listaEmpresas");
    }
}