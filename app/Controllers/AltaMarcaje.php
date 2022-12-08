<?php

namespace App\Controllers;

use App\Entities\Empresas;
use App\Entities\Marcajes;
use App\Entities\Trabajadores;
use App\Entities\Usuarios;
use App\Models\EmpresasModel;
use App\Models\MarcajesModel;
use App\Models\TrabajadoresModel;
use App\Models\UsuariosModel;

class AltaMarcaje extends BaseController
{
    public function index()
    {
        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 3)){
            $empresasModel = new EmpresasModel();
            $TrabajadorModel = new TrabajadoresModel();
            $marcajesModel = new MarcajesModel();

            $data["Empresa"] = $empresasModel->find($this->GetUsuarioLogado()->IdEmpresa);
            $data["Trabajador"] = $TrabajadorModel->find($this->GetUsuarioLogado()->IdTrabajador);

            $marcajes = $marcajesModel->where("IdTrabajador", $this->GetUsuarioLogado()->IdTrabajador)->orderBy("IdMarcaje", "desc")->findAll(1);
            if (count($marcajes) == 1){
                $ultimoMarcaje = $marcajes[0];
                if ($ultimoMarcaje->FechaFin == null){
                    $data["IdMarcaje"] = $ultimoMarcaje->IdMarcaje;
                    $data["Ultimo"] = $ultimoMarcaje->FechaInicio;
                    $data["Jornada"] = $ultimoMarcaje->GetTiempoTotal();
                } else {
                    $data["Ultimo"] = $ultimoMarcaje->FechaInicio;
                }
            }

            return $this->MuestraVista('alta_marcaje', $data);
        } else {
            $this->response->redirect("/");
        }
    }

    public function Guardar(){

        if (($this->GetUsuarioLogado() != null) && ($this->GetUsuarioLogado()->Rol == 3)) {
            $data = $this->request->getPost();
            $marcajesModel = new MarcajesModel();
            $marcaje = new Marcajes();
            if (isset($data["IdMarcaje"]) && ($data["IdMarcaje"] != "")) {
                $marcaje = $marcajesModel->find($data["IdMarcaje"]);
                $marcaje->FechaFin = date("Y-m-d H:i:s");
            } else {
                $marcaje->IdTrabajador = $this->GetUsuarioLogado()->IdTrabajador;
                $marcaje->IdEmpresa = $this->GetUsuarioLogado()->IdEmpresa;
                $marcaje->FechaInicio = date("Y-m-d H:i:s");
            }
            $marcajesModel->save($marcaje);
            $this->response->redirect("/marcaje");
        } else {
            $this->response->redirect("/");
        }
    }
}