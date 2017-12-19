<?php

namespace App\Controller\Auth;

use App\Controller\BaseController;
use App\Log;
use App\Model\Usuario;
use Sirius\Validation\Validator;
use App\Model\Invitacion;

class AuthController extends BaseController
{

    public function getLogin()
    {
        return $this->render('auth/login.twig', []);
    }

    public function postLogin()
    {
        $validator = new Validator();

        $validator->add('inputEmail:Email', 'required', [], 'El {label} es requerido');
        $validator->add('inputEmail:Email', 'email', [], 'No es un email válido');
        $validator->add('inputPassword:Password', 'required', [], 'La {label} es requerida.');

        if ($validator->validate($_POST)) {
            $user = Usuario::where('email', $_POST['inputEmail'])->first();
            if (isset($user) && password_verify($_POST['inputPassword'], $user->password)) {
                $_SESSION['userId'] = $user->id;
                $_SESSION['userName'] = $user->name;
                $_SESSION['userEmail'] = $user->email;

                header('Location: ' . BASE_URL);
                return null;
            }

            $validator->addMessage('authError', 'Los datos son incorrectos');
        }

        Log::logInfo('Intento fallido de login ' . $_POST['inputEmail']);

        $errors = $validator->getMessages();

        return $this->render('auth/login.twig', [
            'errors' => $errors
        ]);
    }

    public function getLogout()
    {

        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);

        header("Location: " . BASE_URL);

    }

    public function postInvite(){
        $validator = new Validator();

        $validator->add('inputEmailInvite:Email', 'required', [], 'El {label} es requerido');
        $validator->add('inputEmailInvite:Email', 'email', [], 'No es un email válido');
    }

    public function getInvite(){
        return "Enviada invitación";
    }
}