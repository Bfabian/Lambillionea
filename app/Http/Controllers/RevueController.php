<?php

namespace App\Http\Controllers;

//On charge le modèle dont le contrôleur a besoin
use App\Revue;
use App\Article;
use App\Tag;
use DB;
use Mail;

use Illuminate\Http\Request;

use Validator;


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
    
    //Action pour afficher le formulaire de demander pour s'abonnner à la revue
    
    public function abonnement(Request $request){
        //Contraintes de validation
        $validator = Validator::make($request->all(),[
            'nom'=>'required',
            'prenom'=>'required|max:10',
        ]);
        //Si l'une des contraintes n'est pas respectée on rédirige à nouveau vers la page du formulaire et on retourne les erreurs ainsi que l'ancien contenu des champs
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
     /*    mail::send('Revues.mail',array(
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'email' => $request->get('email'),
            'adresse' => $request->get('adresse'),
            'ville' => $request->get('ville'),
            'pays' => $request->get('pays')

        ) ,function ($message){
            $message->subject("Demande d'abonnement");
            $message->to('rdily1986@gmail.com');

        });*/
        
        $pays = $request->input('pays');
        
        $UE = array('Allemagne','Autriche', 'Bulgarie', 'Chypre', 'Croatie', 'Danemark', 'Espagne', 'Estonie', 'Finlande', 'France', 'Grèce', 'Hongrie', 'Irlande', 'Italie', 'Lettonie', 'Lituanie', 'Luxembourg', 'Malte', 'Pays-Bas', 'Pologne', 'Portugal', 'République tchèque', 'Roumanie', 'Royaume-Uni', 'Slovaquie', 'Slovénie', 'Suède');
        
        if($pays  === "Belgique"){
            $prix = number_format(55,2);
        }elseif (in_array($pays, $UE)) { 
            $prix = number_format(65,2);
        }else{
            $prix = number_format(75,2);
        }
        
       // On le rédirige vers la page d'accueil et on envoie un message flash de confirmation       
     //return view('Template.layout')->with(['status'=>'Nous avons bien enregistré vos coordonnées !', 'prix'=>$prix, 'pays'=>$pays]);
       //  return \Response::json([ 'prix'=>$prix, 'pays'=>$pays ]);
      // return view('Revues.demandePaiementAbonnement')->with(['prix'=>$prix, 'pays'=>$pays]);
       
       //return back()->with(['prix'=>$prix, 'pays'=>$pays]);
       // var_dump($prix); die;

      //return back()->with(['prix'=>$prix, 'pays'=>$pays]);
        
    //return \Response::json(['prix'=>$prix, 'pays'=>$pays ]);
        
        \Session::flash('submitted', true);
        
        return redirect()->back()->with(['prix'=>$prix]);
    
   //   return \Response::json(['prix'=>$prix, 'pays'=>$pays ]);
    
    }
    

    
}

