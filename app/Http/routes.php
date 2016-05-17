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
    /*-----------------------------------------------------
     * Panier d'achats
     -----------------------------------------------------*/
     Route::bind('revue', function($id){
         return App\Revue::where('id',$id)->first();
     });

     Route::get('/panier/show', [
    'as'=>'panier-show',
    'uses'=>'PanierController@show'
    ]);
     
    Route::get('/panier/add/{revue}', [
    'as'=>'panier-add',
    'uses'=>'PanierController@add'
    ]);
    
    Route::get('/panier/delete/{revue}', [
    'as'=>'panier-delete',
    'uses'=>'PanierController@delete'
    ]);
    
    Route::get('/panier/trash', [
    'as'=>'panier-trash',
    'uses'=>'PanierController@trash'
    ]);
    
    Route::get('/panier/update/{revue}/{quantite?}', [
    'as'=>'panier-update',
    'uses'=>'PanierController@update'
    ]);

     Route::get('/panier/livraison', ['as' => 'panier-adresse-livraison', function(){ 
        return view('Paniers.formulaireCommande');         
    }]);
    
    /*------------------------
     *  Transactions Paypal
     --------------------------*/
    
    // Envoyez notre commande à PayPal
    Route::get('payment', array(
            'as' => 'payment',
            'uses' => 'PaypalController@postPayment',
    ));
    
    // Après avoir effectué le paiement Paypal on rédirectionne vers cette route-ci
    Route::get('payment/status', array(
            'as' => 'payment.status',
            'uses' => 'PaypalController@getPaymentStatus',
    ));
    
        // Après avoir effectué le paiement Paypal pour l'abonnement on rédirectionne vers cette route-ci
    Route::get('payment-abonnement/status', array(
            'as' => 'payment.abonnement.status',
            'uses' => 'PaypalController@getPaymentAbonnementStatus',
    )); 
    
    //Requête paypal pour la cotisation (abonnement revue)
     Route::get('payment-abonnement/{prix}', array(
            'as' => 'paymentAbonnement',
            'uses' => 'PaypalController@postPaymentAbonnement',
    ));
     

    
    /*----------------------------
     * Abonnement Revue
     -------------------------------*/
   //S'abonner à la revue (Chargement du formulaire de demande d'abonnement)    
  /*  Route::get('/revues/demande-abonnement', [
        'as'=>'demande-abonnement-revues',
        'uses'=>'RevueController@demandeAbonnement'
    ]);*/
    
    //Envoie de l'email pour s'abonner à la revue
    Route::post('/revues/abonnement', [
        'as'=>'abonnement-revues',
        'uses'=>'RevueController@abonnement'
    ]);


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

