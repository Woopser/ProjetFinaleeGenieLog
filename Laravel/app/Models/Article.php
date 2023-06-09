<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom','prix','campagne_id','image','nb_max'];

    public function dimensions(){
        return $this->belongsToMany('App\Models\Dimension');
    }

    public function couleurs(){
        return $this->belongsToMany('App\Models\Couleur');
    }

    public function commandes(){
        return $this->belongsTo(Commande::class, 'article_id');
    }
}
