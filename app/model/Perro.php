<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Perro extends Model{
    protected $table = 'perros';
    protected $fillable = ['nombre','raza','peso','color','edad'];
}