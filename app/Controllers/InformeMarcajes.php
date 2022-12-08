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
use Dompdf\Dompdf;

class InformeMarcajes extends BaseController
{
    public function index()
    {
        $this->response->redirect("/");
    }

    public function InformeMarcajes($idTrabajador){

        if (($this->GetUsuarioLogado() != null) && (($this->GetUsuarioLogado()->Rol == 2) || ($this->GetUsuarioLogado()->Rol == 3))) {

            $marcajesModel = new MarcajesModel();
            $data["marcajes"] = $marcajesModel->where("IdTrabajador", $idTrabajador)->findAll();

            $dompdf = new Dompdf();

            $dompdf->loadHTML( view('marcajes_pdf', $data));
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $dompdf->stream();

        } else {
            $this->response->redirect("/");
        }
    }
}