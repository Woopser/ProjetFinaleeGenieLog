<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom','codeRGB'];

    public function articles(){
        return $this->belongsToMany('App\Models\Article');
    }

}
