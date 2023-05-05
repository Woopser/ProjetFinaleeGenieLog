<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['id','article_id', 'couleur_id','dimension_id','campagne_id', 'compte_id','compte_id_modification','dateCommande','statu'];

    public function Commandes()
    {
        return $this->belongsToMany('App\Models\Commande');
    }

    public function articles()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
    public function dimensions()
    {
        return $this->belongsTo(Dimension::class, 'dimension_id');
    }
    public function couleurs()
    {
        return $this->belongsTo(Couleur::class, 'couleur_id');
    }
    public function campagnes()
    {
        return $this->belongsTo(Campagne::class, 'campagne_id');
    }


}
