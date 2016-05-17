<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevuePanier extends Model{
    
    protected $table = 'revue_panier';
    
     protected $fillable = [
        'revue_id', 'panier_id','quantite','prixHTVA'
    ];
    
    public $timestamps = false; 
    

    
}
