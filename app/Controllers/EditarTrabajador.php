<?php

namespace App\Controllers;

use App\Entities\Empresas;
use App\Entities\Trabajadores;
use App\Entities\Usuarios;
use App\Models\EmpresasModel;
use App\Models\MarcajesModel;
use App\Models\TrabajadoresModel;
use App\Models\UsuariosModel;

class EditarTrabajador extends BaseController
{
    public function index()
    {
        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 2)){
            return $this->MuestraVista('editar_trabajador');
        } else {
            $this->response->redirect("/");
        }
    }

    public function MuestraTrabajador($idTrabajador){
        $usuariosModel = new UsuariosModel();
        $trabajadoresModel = new TrabajadoresModel();
        $marcajesModel = new MarcajesModel();

        $data['trabajador'] = $trabajadoresModel->find($idTrabajador);
        $data['usuario'] = $usuariosModel->where("IdTrabajador", $idTrabajador)->findAll(1)[0];
        $data['marcajes'] = $marcajesModel->where("IdTrabajador", $idTrabajador)->findAll();

        return $this->MuestraVista('editar_trabajador', $data);

    }

    public function Guardar(){

        $trabajadoresModel = new TrabajadoresModel();

        $data = $this->request->getPost();
        $trabajador = new Trabajadores($data);
        if ($trabajadoresModel->save($trabajador)){

            if ($data["Contraseña"] != ''){
                $usuariosModel = new UsuariosModel();
                $usuario = $usuariosModel->where("IdTrabajador", $trabajador->IdTrabajador)->where("Rol", 3)->findAll(1)[0];
                $usuario = $usuario->EstableceClave($data['Contraseña']);
                $usuario->DebeCambiarPassword = true;
                $usuariosModel->save($usuario);
            }

            $this->response->redirect("listaTrabajadores");
        } else {
            $this->response->redirect("/");
        }
    }
}