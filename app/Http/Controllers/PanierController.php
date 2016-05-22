<?php

namespace App\Http\Controllers;

//On charge le modèle dont le contrôleur a besoin
//use App\Panier;
use App\Revue;

use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class PanierController extends Controller{
    //Si la vairable de session panier n'existe pas alors on la crée. Pour la première fois qu'on clique sur ajouter au panier
    public function __construct(){
        if(!\Session::has('panier')){
            
            \Session::put('panier', array());
        } 
    }
    
    //show panier
    
    //A chaque fois qu'on va effectuer une opération sur la panier on va obtenir cette variable de session, on le stocke dans une variable locale.
    //On fait toutes les opérations sur cet array stocké dans cette variable. Une fois les opérations terminées on stocke à nouveau la variable locale dans notre variable de session
    //Ainsi, notre variable de session restera actualisée
    public function show(){
        $panier = \Session::get('panier');
        
        //On génère la variable $total en appelant la méthode privée total() (voir ligne 101)
        $total = $this->total();
        
        return view('Paniers.detail', compact('panier', 'total'));
    }
    
    //add item
    
    public function add(Revue $revue){
     
        //On récupère la variable de session et on la stocke dans une variable locale
        $panier = \Session::get('panier');
        //On va ajouter cet item qui est un objet de la classe Revue et pour pouvoir l'identifier au sein de notre array on va utiliser son id
        //Par défaut, la première fois qu'un utilisateur ajoute une revue au panier la quantité est = 1. Ensuite lorsqu'il visualise la panier on lui donne la possibilité de mettre la quantité qu'il veut
        $revue->quantite = 1;
        $panier[$revue->id] = $revue;
        
        //On actualise la variable de session
        \Session::put('panier',$panier);
        
        //Il redirige à la vue qui va contenir ce panier là
        return redirect()->route('panier-show');
    //return redirect()->route('listeRevues')->with(['status'=>'La revue a bien été ajouté à votre panier !']);

    }
    
    //delete item
    
    public function delete(Revue $revue){
       $panier = \Session::get('panier');
       
       //On récupère l'id de la revue en question et on la supprime avec la méthode unset en le répérant dans notre array grâce à cet id
       unset($panier[$revue->id]);
       
       //On actualise notre variable de session
       \Session::put('panier',$panier);
       
       //On redirige vers le panier
       return redirect()->route('panier-show');
    }
    
    
    //vider panier
    
    public function trash(){
        
        //On lui demande de supprimer tout ce qu'il y a dans la variable de session panier
        \Session::forget('panier');
        
        //On redirige vers le panier
       return redirect()->route('panier-show');
        
    }
    
    
    //update item
    
    public function update(Revue $revue, $quantite){
        
       $panier = \Session::get('panier');
       
       //On récupère l'id de la revue en question et on la supprime avec la méthode unset en le répérant dans notre array grâce à cet id
       $panier[$revue->id]->quantite = $quantite;
       
       //On actualise notre variable de session
       \Session::put('panier',$panier);
       
       //On redirige vers le panier
       return redirect()->route('panier-show');
    }
    
    //Total
    
    //Cette méthode privée sera appelée dans la méthode show de cette classe PanierController
    private function total(){
        
        $panier = \Session::get('panier');
        
        $total = 0;
        
        //On parcourt tous les items du panier et on additionne les sous-totaux à la variable $total
        foreach($panier as $item){
            $total += 50 * $item->quantite; //Le prix* la quantite pour chaque item du panier
        }
        
        return $total;

    }
    
    //Adresse de livraison
    
        public function livraison(Request $request){

        //On crée la variable de session abonnement avec un array contenant les données reçues en post
        //if(!\Session::has('client')){
            
            \Session::put('client', array( 
            'civilite' => $request->get('civilite'),    
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'rue' => $request->get('rue'),
            'cp' => $request->get('cp'),
            'ville' => $request->get('ville'),
            'pays' => $request->get('pays')));
      //  } 
        
        $client = \Session::get('client');    
        
         $panier = \Session::get('panier');
         $total = $this->total();
        //var_dump($client);
        
     return view('Paniers.detailCommande', compact('panier', 'total', 'client'));
     
    }
    


}
