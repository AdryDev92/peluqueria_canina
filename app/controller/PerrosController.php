<?php
namespace App\Controller;

use App\Model\Perro;
use Sirius\Validation\Validator;

class PerrosController extends BaseController
{


    public function getNew()
    {
        $errors = array();  // Array donde se guardaran los errores de validación

        $webInfo = [
            'h1' => 'Añadir perro',
            'submit' => 'Añadir',
            'method' => 'POST'
        ];


        $perros = array_fill_keys(["nombre","raza","peso","color","edad"], "");

        return $this->render('formPerros.twig', [
            'perro' => $perros,
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }


    public function postNew()
    {
        $webInfo = [
            'h1' => 'Añadir perro',
            'submit' => 'Añadir',
            'method' => 'POST'
        ];

        if (!empty($_POST)) {
            $validator = new Validator();

            $requiredFieldMessageError = "El campo {label} es requerido";

            $validator->add('nombre:Nombre', 'required', [], $requiredFieldMessageError);
            $validator->add('raza:Raza', 'required', [], $requiredFieldMessageError);
            $validator->add('peso:Peso', 'required', [], $requiredFieldMessageError);
            $validator->add('color:Color', 'required', [], $requiredFieldMessageError);
            $validator->add('edad:Edad', 'required', [], $requiredFieldMessageError);


            // Extraemos los datos enviados por POST
            $perros['nombre'] = htmlspecialchars(trim($_POST['nombre']));
            $perros['raza'] = htmlspecialchars(trim($_POST['raza']));
            $perros['peso'] = htmlspecialchars(trim($_POST['peso']));
            $perros['color'] = htmlspecialchars(trim($_POST['color']));
            $perros['edad'] = htmlspecialchars(trim($_POST['edad']));


            if ($validator->validate($_POST)) {
                $perros = new Perro([
                    'nombre' => $perros['nombre'],
                    'raza' => $perros['raza'],
                    'peso' => $perros['peso'],
                    'color' => $perros['color'],
                    'edad' => $perros['edad']

                ]);
                $perros->save();

                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
                header('Location: ' . BASE_URL);
            } else {
                $errors = $validator->getMessages();
            }
        }

        return $this->render('formPerros.twig', [
            'perro' => $perros,
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }


    public function getEdit($id)
    {
        $errors = array();  // Array donde se guardaran los errores de validación

        $webInfo = [
            'h1' => 'Actualizar registro',
            'submit' => 'Actualizar',
            'method' => 'PUT'
        ];

        // Recuperar datos
        $perros = Perro::find($id);

        if (!$perros) {
            header('Location: home.twig');
        }

        return $this->render('formPerros.twig', [
            'perro' => $perros,
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }


    public function putEdit($id)
    {
        $errors = array();  // Array donde se guardaran los errores de validación

        $webInfo = [
            'h1' => 'Actualizar registro',
            'submit' => 'Actualizar',
            'method' => 'PUT'
        ];

        if (!empty($_POST)) {
            $validator = new Validator();

            $requiredFieldMessageError = "El campo {label} es requerido";

            $validator->add('nombre:Nombre', 'required', [], $requiredFieldMessageError);
            $validator->add('raza:Raza', 'required', [], $requiredFieldMessageError);
            $validator->add('peso:Peso', 'required', [], $requiredFieldMessageError);
            $validator->add('color:Color', 'required', [], $requiredFieldMessageError);
            $validator->add('edad:Edad', 'required', [], $requiredFieldMessageError);


            // Extraemos los datos enviados por POST
            $perros['id'] = $id;
            $perros['nombre'] = htmlspecialchars(trim($_POST['nombre']));
            $perros['raza'] = htmlspecialchars(trim($_POST['raza']));
            $perros['peso'] = htmlspecialchars(trim($_POST['peso']));
            $perros['color'] = htmlspecialchars(trim($_POST['color']));
            $perros['edad'] = htmlspecialchars(trim($_POST['edad']));


            if ($validator->validate($_POST)) {
                $perros = Perro::where('id', $id)->update([
                    'id' => $perros['id'],
                    'nombre' => $perros['nombre'],
                    'raza' => $perros['raza'],
                    'peso' => $perros['raza'],
                    'color' => $perros['color'],
                    'edad' => $perros['edad']

                ]);

                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
                header('Location: ' . BASE_URL);
            } else {
                $errors = $validator->getMessages();
            }
        }
        return $this->render('formPerros.twig', [
            'perro' => $perros,
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }


    public function getIndex($id = null)
    {
        if (is_null($id)) {
            $webInfo = [
                'title' => 'Página principal'
            ];

            $perros = Perro::query()->orderBy('id', 'desc')->get();

            return $this->render('home.twig', [
                'perro' => $perros,
                'webInfo' => $webInfo
            ]);

        } else {
            // Recuperar datos

            $webInfo = [
                'title' => 'Página de registro'
            ];

            $perros = Perro::find($id);

            if (!$perros) {
                return $this->render('404.twig', ['webInfo' => $webInfo]);
            }

            return $this->render('perro/perro.twig', [
                'perro' => $perros,
                'webInfo' => $webInfo,
            ]);
        }

    }

/*    public function postIndex($id)
    {
        $errors = [];
        $validator = new Validator();

        $validator->add('name:Nombre', 'required', [], 'El {label} es necesario para comentar');
        $validator->add('name:Nombre', 'minlength', ['min' => 5], 'El {label} debe tener al menos 5 caracteres');
        $validator->add('email:Email', 'required', [], 'El {label} no es válido');
        $validator->add('email:Email', 'required', [], 'El {label} es necesario para comentar');
        $validator->add('comment:Comentario', 'required', [], 'Aunque los silencios a veces dicen mucho no se permiten comentarios vacíos');

        if ($validator->validate($_POST)) {
            $comment = new Comment();

            $comment->distro_id = $id;
            $comment->user = $_POST['name'];
            $comment->email = $_POST['email'];
            $comment->ip = getRealIP();
            $comment->text = $_POST['comment'];
            $comment->approved = true;

            $comment->save();

            header("Refresh: 0 ");
        } else {
            $errors = $validator->getMessages();
        }

        $webInfo = [
            'title' => 'Página de Distro - DistroADA'
        ];

        $perros = Perro::find($id);
        $webInfo = [
            'title' => 'Página de Distro - DistroADA'
        ];

        if (!$perros) {
            return $this->render('404.twig', ['webInfo' => $webInfo]);
        }

        return $this->render('perro/perro.twig', [
            'errors' => $errors,
            'webInfo' => $webInfo,
            'perro' => $perros,
        ]);
    }*/

    public function deleteIndex()
    {
        $id = $_REQUEST['id'];

        $perros = Perro::destroy($id);

        header("Location: " . BASE_URL);
    }
}