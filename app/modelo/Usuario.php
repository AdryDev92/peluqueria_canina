<?php

namespace App\Modelo;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    protected $table = 'perros';
    protected $fillable = ['nombre','raza','peso','color','edad'];
}