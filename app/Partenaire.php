<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model{
    //Ratacher le modèle à une table particulière
    protected $table = 'partenaires';
    
    public $timestamps = false; 

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'adresse','email','url','personneContact','telephone'
    ];
}
