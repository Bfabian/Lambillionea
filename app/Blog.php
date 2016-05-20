<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    //Ratacher le modèle à une table particulière
    protected $table = 'blogs';
    
    public $timestamps = false; 

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre', 'description','dateEvent','lieu','adresse','email','telephone','heureDebut','heureFin'
    ];
    

}
