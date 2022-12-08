<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class CambioContraseña extends BaseController
{
    public function index()
    {
        return view('cambio_contraseña');
    }

    public function Guardar(){

        if ($this->GetUsuarioLogado() != null) {

            $usuariosModel = new UsuariosModel();
            $data = $this->request->getPost();
            $usuario = $usuariosModel->find($this->GetUsuarioLogado()->IdUsuario);
            $usuario = $usuario->EstableceClave($data['nuevaContraseña']);
            $usuario->DebeCambiarPassword = false;
            $usuariosModel->save($usuario);
            $this->session->set("Usuario", $usuario);

            return $this->response->redirect($this->GetUsuarioLogado()->PaginaPrincipal());
        } else {
            $this->response->redirect("/");
        }
    }
}