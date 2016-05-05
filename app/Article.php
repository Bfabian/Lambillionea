<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model{
    //
    
     protected $table = 'articles';
     
   
    public function listeRevues(){ 
        return $this->belongsToMany('App\Revue'); /*Les revues par article*/ 
    } 
    
     public function listeTags(){ 
        return $this->belongsToMany('App\Tag'); /*Les tags par article*/ 
    } 
}
