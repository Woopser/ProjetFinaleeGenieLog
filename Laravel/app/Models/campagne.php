<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom', 'dateDebut','dateFin','enCours','dateDebFond','fichierCommande','dateRemiseFond'];

    public function Campagnes()
    {
        return $tis->belongsToMany('App\Models\Campagne');
    }
}
