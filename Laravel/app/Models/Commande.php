<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['id','article_id', 'couleur_id','dimension_id', 'compte_id','compte_id_modification','dateCommande','statu'];

    public function Commandes()
    {
        return this->belongsToMany('App\Models\Commande');
    }
}
