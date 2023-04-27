<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

class Compte extends Authenticable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = ['nom','prenom','password','typeCompte','email'];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    
}
