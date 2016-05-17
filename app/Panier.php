<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model{
    protected $table = 'paniers';
    
     protected $fillable = [
        'dateCreation', 'valide','paye','total'
    ];
    
    public $timestamps = false; 
    
     public function listeRevues(){ 
        return $this->belongsToMany('App\Revue', 'revue_panier'); /*Les revues par panier*/ 
    } 
}


