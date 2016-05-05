<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revue extends Model{
    //Ratacher le modèle à une table particulière
    protected $table = 'revues';

    //Retourne la liste d'articles par revue
    public function listeArticles(){
        
        return $this->belongsToMany('App\Article'); 
    }
    

}
