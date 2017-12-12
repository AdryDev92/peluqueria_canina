<?php


namespace App\Modelo;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model{
    protected $table = 'propietario';
    protected $fillable = ['nombre','apellidos','cuenta_bancaria','dni','correo'];
}