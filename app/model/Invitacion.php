<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Invitacion {
    protected $table = 'invitacion';
    protected $fillabe = ['email','used','cuenta'];
    }