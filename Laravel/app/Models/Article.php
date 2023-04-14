<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom','prix','campagne_id','image'];

    public function campagnes(){
        return $this->hasMany('App\Article');
    }
}
