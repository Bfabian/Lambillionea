<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use db;
use app\Article;
use Mail;
use Validator;

class ArticleController extends Controller
{
    public function ProposeArticle(){
        return view('Articles.FormulairePropose');
    }
    public function post(Request $request){

        $validator = Validator::make($request->all(),[
            'titre'=>'required',
            'nom'=>'required',
        ]);
        if($validator->fails()){
            return redirect('/publier/proposearticle')->withErrors($validator)->withInput();
        }
        mail::send('Articles.mail',array(
            'nom' => $request->get('nom'),
            'titre' => $request->get('titre')
        ) ,function ($message){
            $message->subject("Proposition d'article");
            $message->to('barnichfabian@gmail.com');
        });
        return Redirect('/publier/proposearticle')->with('message', 'Votre demande est envoyer');
    }
}
