<?php

namespace App\Http\Controllers;

//On charge le modèle dont le contrôleur a besoin
use App\Blog;
use App\Partenaire;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('Admin.home');
    }
    
    /*-------------------------------------------
     * Gestion des évènements
     -------------------------------------------*/
    
    //Afficher la liste d'évènements
    public function listeEvenements(){ 
        $blogs = Blog::all(); 
         
        return view('Admin.Blogs.liste',['blogs'=>$blogs]);
    }
    
     //Action pour afficher le formulaire
    public function addEvenement(){
       
        return view('Admin.Blogs.formAddArticle');

    }
    
    //Action pour faire un insert
    public function validEvenement(Request $request){
        //Contraintes de validation
        $validator = Validator::make($request->all(),[
            'titre'=>'required',
            'description'=>'required|max:50',
        ]);
        //Si l'une des contraintes n'est pas respectée on rédirige à nouveau vers la page du formulaire et on retourne les erreurs ainsi que l'ancien contenu des champs
        if($validator->fails()){
            return redirect('/add')->withErrors($validator)->withInput();
        }
        //Sinon on fait l'insert 
        $parameters = $request->except(['_token']);
        //$parameters = $request->all();
        //var_dump($parameters); die;
        
        //On appelle le modèle
        Blog::create($parameters);
        
       // On le rédirige vers la page d'accueil et on envoie un message flash de confirmation      
        return redirect('/admin/evenements')->with(['success'=>'Évènement enregistré !']);

    }
    
    //Action pour modifier un évènemenet
    public function updateEvenement(Request $request, $id){
        $evenement = Blog::where('id','=',$id)->first();
        
        if($request->isMethod('post')){
            
            $parameters = $request->except(['_token']);
            $evenement->titre = $parameters['titre'];
            $evenement->description = $parameters['description'];
            $evenement->dateEvent = $parameters['dateEvent'];
            $evenement->lieu = $parameters['lieu'];
            $evenement->adresse = $parameters['adresse'];
            $evenement->email = $parameters['email'];
            $evenement->telephone = $parameters['telephone'];
            $evenement->heureDebut = $parameters['heureDebut'];
            $evenement->save();
            
            return redirect('/admin/evenements')->with(['success'=>'Évènement correctement modifié !']);

        }
        
        return view('Admin.Blogs.formAddArticle')->with('evenement',$evenement);
    }
    
    //Action pour supprimer un évènement
    
     public function deleteEvenement($id){
        $evenement = Blog::where('id','=',$id)->first();
        $evenement->delete();
       
        return redirect('/admin/evenements')->with(['success'=>'Évènement correctement supprimé !']);

    }
    
    /*-------------------------------------------
     * Gestion des liens partenaires
     -------------------------------------------*/
     //Afficher la liste d'évènements
    public function listePartenaires(){ 
        $partenaires = Partenaire::all(); 
         
        return view('Admin.Partenaires.liste',['partenaires'=>$partenaires]);
    }
    
     //Action pour afficher le formulaire
    public function addPartenaire(){
       
        return view('Admin.Partenaires.formAddPartenaire');

    }
    
    //Action pour faire un insert
    public function createPartenaire(Request $request){
        //Contraintes de validation
        $validator = Validator::make($request->all(),[
            'nom'=>'required',
            'description'=>'required|max:40',
        ]);
        //Si l'une des contraintes n'est pas respectée on rédirige à nouveau vers la page du formulaire et on retourne les erreurs ainsi que l'ancien contenu des champs
        if($validator->fails()){
            return redirect('/admin/add/association-partenaire')->withErrors($validator)->withInput();
        }
        //Sinon on fait l'insert 
        $parameters = $request->except(['_token']);
        
        //On appelle le modèle
        Partenaire::create($parameters);
        
       // On le rédirige vers la page d'accueil et on envoie un message flash de confirmation      
        return redirect('/admin/associations-partenaires')->with('success', 'Nouvelle association partenaire enregistrée !');

    }
    
     //Action pour modifier un évènemenet
    public function updatePartenaire(Request $request, $id){
        $partenaire = Partenaire::where('id','=',$id)->first();
        
        if($request->isMethod('post')){
            
            $parameters = $request->except(['_token']);
            $partenaire->nom = $parameters['nom'];
            $partenaire->adresse = $parameters['adresse'];
            $partenaire->url = $parameters['url'];
            $partenaire->personneContact = $parameters['personneContact'];
            $partenaire->telephone = $parameters['telephone'];
            $partenaire->email = $parameters['email'];
            $partenaire->telephone = $parameters['telephone'];
            $partenaire->email = $parameters['email'];
            $partenaire->description = $parameters['description'];
            $partenaire->save();
            
            return redirect('/admin/associations-partenaires')->with(['success'=>'Association partenaire correctement modifiée !']);

        }
        
        return view('Admin.Partenaires.formAddPartenaire')->with('partenaire',$partenaire);
    }
    
    //Action pour supprimer une association partenaire
    
     public function deletePartenaire($id){
        $partenaire = Partenaire::where('id','=',$id)->first();
        $partenaire->delete();
       
        return redirect('/admin/associations-partenaires')->with(['success'=>'Association partenaire correctement supprimée !']);

    }
    
}
