<?php
namespace App\Controller;

use App\Controller\Auth\AuthController;
use App\Controller\Auth\RegisterController;
use App\Model\Perro;
use App\Model\Usuario;

class HomeController extends BaseController {

    /**
     * Ruta / donde se muestra la página de inicio del proyecto.
     *
     * @return string Render de la página
     */
    public function getIndex(){
        $perros = new PerrosController();

        return $perros->getIndex();
    }

    public function getContacto(){
        return 'Información de contacto';
    }

    public function getLogin(){
        $auth = new AuthController();

        return $auth->getLogin();
    }

    public function postLogin(){
        $auth = new AuthController();

        return $auth->postLogin();
    }

    public function getRegistro(){
        $register = new RegisterController();

        return $register->getRegister();
    }

    public function postRegistro(){
        $register = new RegisterController();

        return $register->postRegister();
    }

    public function getLogout(){
        $auth = new AuthController();

        return $auth->getLogout();
    }

    public function postInvite(){
        $auth = new AuthController();
        return $auth->postInvite();
    }

    public function getInvite(){
        $auth=new AuthController();
        return $auth->getInvite();
    }
}