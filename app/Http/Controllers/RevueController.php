<?php

namespace App\Http\Controllers;

//On charge le modèle dont le contrôleur a besoin
use App\Revue;
use App\Article;
use App\Tag;
use DB;

use Illuminate\Http\Request;


//Action pour afficher la liste de toutes les revues 
class RevueController extends Controller{
    //La liste de revues
     public function liste(){ 
        $revues = Revue::paginate(5); 
        
       // var_dump($revues); die;
         
        return view('Revues.liste',['revues'=>$revues]);

    }
    
    //Action pour afficher le détail d'une revue
     public function detailRevueLoad(){ 

         $revueID = \Request::get('revueID'); 
         $search = \Request::get('search'); 
         
         $revue = Revue::find($revueID);
         
         $articles = Revue::find($revueID)->listeArticles; 
  
      return view('Revues.detail',['revue'=>$revue, 'articles'=>$articles, 'search'=>$search]);      

    }
    
    //Action pour trier les revues par année
    public function tri(){ 
        
       $annee = \Request::get('annee');  
       
       if(!empty($_GET['annee'] && $_GET['annee'] == 'Toutes')){
         
            $revues = Revue::paginate(5);            
      }else{                  
           $revues = Revue::where('annee','=',$annee)->get(); 
      }
           
       return view('Revues.tri',['revues'=>$revues]); 
    }
    
    //Action pour retourner les revues qui correspondent à l'une de suggestions du moteur de recherche
     public function recherche(){ 
     if (isset($_GET['articleID'])) {
       $articleID = \Request::get('articleID'); 
       
       //Va chercher la liste de revues des articles dont l'id = $id 
       $revues = Article::find($articleID)->listeRevues; 
       
      }elseif (isset($_GET['tagID'])) {
          
          $tagID= \Request::get('tagID'); 
          //On va d'abord chercher les articles par tagID
          $articles = Tag::find($tagID)->listeArticles;
          
          //Ensuite pour chaque article on va chercher son id et on prend les revues par articleID
          foreach ($articles as $article){
              $articleID = $article->id;
              $revues = Article::find($articleID)->listeRevues;
          }

          
      }
      
       //Va chercher la liste de revues des tags dont l'id = $id
       
       return view('Revues.tri',['revues'=>$revues]); 
    }
    
    //Action pour effectuer une recherche par tag ou par article
    public function rechercheListe(Request $request){ 

     $search = $request->input('search'); 

       $articles = Article::where('titre', 'like', $search.'%')->get(); 
       $tags = Tag::where('titre', 'like', $search.'%')->get(); 

         return \Response::json(['articles'=>$articles, 'tags'=>$tags ]);

    }

    
}

