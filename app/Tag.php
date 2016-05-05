<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
    //
    protected $table = 'tags';
    
    public function listeArticles(){ 
        return $this->belongsToMany('App\Article', 'tag_article'); /*Les articles par tag*/ 
    } 
}
