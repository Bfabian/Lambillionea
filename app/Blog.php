<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    //Ratacher le modèle à une table particulière
    protected $table = 'blogs';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre', 'texte','tri','image',
    ];
    

}
