<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;
    protected $fillable = ['id','dimension'];

    public function articles(){
        return $this->belongsToMany('App\Models\Article');
    }
}
