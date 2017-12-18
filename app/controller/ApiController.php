<?php
namespace App\Controllers;

use App\Model\Perro;

class ApiController
{

    public function getPerros($id = null)
    {
        if (is_null($id)) {
            $perros = Perro::all();

            header('Content-Type: application/json');
            return json_encode($perros);
        } else {
            $perros = Perro::find($id);

            header('Content-Type: application/json');
            return json_encode($perros);
        }
    }
}