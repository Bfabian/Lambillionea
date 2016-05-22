<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use app\Article;
use Mail;
use Validator;

class ArticleController extends Controller{
    
//Action pour envoyer par email la demande pour devenir auteur
    
    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'titre'=>'required',
            'nom'=>'required',
            'texte'=>'required|max:25',
        ]);
        if($validator->fails()){
            return redirect('/publier')->withErrors($validator)->withInput();
        }
        Mail::send('Articles.mail',array(
            'nom' => $request->get('nom'),
            'titre' => $request->get('titre'),
            'texte' => $request->get('texte')
        ) ,function ($message){
            $message->subject("Proposition d'article");
            $message->to('rdily1986@gmail.com');
        });
        return Redirect('/publier')->with('message', 'Votre demande nous est bien parvenue et sera traitée dans les plus brefs délais.');
    }
}
