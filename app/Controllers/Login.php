<?php

namespace App\Controllers;

use App\Entities\Usuarios;
use App\Models\UsuariosModel;

class Login extends BaseController
{
    private const USUARIO_INCORRECTO = 'Usuario o Contraseña incorrecta';
    private const DATOS_INCOMPLETOS = 'Debe indicar Usuario y la Contraseña';

    public function index()
    {
        return view('login');
    }

    public function validar(){

        if (( $this->request->getPost('usuario')!=="") && ( $this->request->getPost('contraseña')!=="")){
            $login= $this->request->getPost('usuario');
            $pass= $this->request->getPost('contraseña');

            $usuarioModel = new UsuariosModel();
            $usuarios = $usuarioModel->where("Login", $login)->findAll(1);
            if (count($usuarios) == 1){
                $usuarioLogeado = $usuarios[0];
                if($usuarioLogeado instanceof Usuarios) {
                    if ($usuarioLogeado->ClaveCorrecta($pass)) {
                        $this->session->set("Usuario", $usuarioLogeado);

                        return $this->response->redirect($usuarioLogeado->PaginaPrincipal());
                    } else {
                        $this->session->setFlashdata("error",  $this::USUARIO_INCORRECTO);
                    }
                }
            } else {
                $this->session->setFlashdata("error", $this::USUARIO_INCORRECTO);
            }
        } else {
            $this->session->setFlashdata("error", $this::DATOS_INCOMPLETOS);
        }

        return $this->index();
    }

    public function desconectarse(){
        session_destroy();
        $this->response->redirect("/");
    }
}