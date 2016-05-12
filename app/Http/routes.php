<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware'=>['web']], function(){
    
    //Groupe des routes pour la partie admin
    Route::group(['prefix'=>'admin'], function(){
        
    });
 
});
// Fabian**************************************************************************
//Pour formulaire de proposeArticle
Route::get('/publier/proposearticle',[
    'as'=>'ProposeArticle',
    'uses'=>'ArticleController@ProposeArticle'
]);
Route::post('/publier/proposearticle',[
    'as'=>'ProposeArticle',
    'uses'=>'ArticleController@post'
]);
/****************************************************

   /*La liste de revues*/
    Route::get('/revues', [
    'as'=>'listeRevues',
    'uses'=>'RevueController@liste'
    ]);
    
  
    //Le detail de la revue
  Route::get('/detailRevueLoad', [
    'as'=>'detailRevueLoad',
    'uses'=>'RevueController@detailRevueLoad'
    ]);
  
    //Tris des revues
    Route::get('/triRevue', [
    'as'=>'triRevue',
    'uses'=>'RevueController@tri'
    ]);
    
    //Tris des revues selon la recherche effectuée (par tag ou par article)
    Route::get('/recherche', [
    'as'=>'recherche',
    'uses'=>'RevueController@recherche'
    ]);
    
    Route::get('/rechercheListe', [
    'as'=>'rechercheListe',
    'uses'=>'RevueController@rechercheListe'
    ]);

    Route::get('/publier', [
    'as'=>'demandePublier',
    'uses'=>'BlogController@liste'
    ]);
    
    Route::get('/publier', ['as' => 'demandePublier', function(){ 
        return view('Articles.infosPublication');         
    }]);
 
    Route::get('/evenements', [
    'as'=>'listeEvenements',
    'uses'=>'BlogController@liste'
    ]);

    Route::get('/{accueil?}', ['as' => 'accueil', function(){ 
        return view('Accueil.detail');         
    }]);
    
 /*---------------------------------*/   
  /*Route::get('/detailRevue', [
    'as'=>'detailRevue',
    'uses'=>'RevueController@detail'
    ]);*/    



/*View::composer('*', function($view)
{
    $view->with('pages', \App\Page::all());
});*/

/* /slug-rubrique */
/*Route::get('/', [
    'as'=>'detailAccueil',
    'uses'=>'AccueilController@detail'
]);*/
// Fabian**************************************************************************
//Pour formulaire de proposeArticle
/*Route::get('/publier/proposearticle',[
    'as'=>'ProposeArticle',
    'uses'=>'ArticleController@ProposeArticle'
]);
Route::post('/publier/proposearticle',[
    'as'=>'ProposeArticle',
    'uses'=>'ArticleController@post'
]);
//route::post('article','ArticleController@post');
//Route::get(' proposearticle', ['as' => 'ProposeArticle', function(){
//    return view('ProposeArticle');
//}]);
//Route::get('proposearticle', ['as' => 'ProposeArticle', function(){
//    return view('Articles.FormulairePropose');
//}]);
//Route::get('/publier/proposearticle','ArticleController@ProposeArticle');
//Route::post('proposearticle','ArticleController@post');
//Pour l'envois du formulaire par mail

