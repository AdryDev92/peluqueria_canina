<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Invitacion extends Model{
    protected $table = 'invitacion';
    protected $fillabe = ['email','used','cuenta'];
    }