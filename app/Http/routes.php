<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

/*------------------------------------------
 * ROUTES BACKOFFICE
 -----------------------------------------------*/

    
    //Groupe des routes pour la partie admin
    Route::group(['prefix'=>'admin'], function(){
        /*Route::get('/',function(){
            return view('layouts.app');
        });*/
        Route::auth();

            Route::group(['middleware' => 'auth'], function() {
                
                Route::get('/',function(){
                    return view('Admin.home');
                });
                
                Route::get('/home', 'HomeController@index');
                
                //Gestion des évènements
                Route::get('/evenements', [
                'as'=>'listeEvenements',
                'uses'=>'HomeController@listeEvenements'
                ]);

                Route::get('/add/evenement', [
                    'as'=>'ajouterEvenement',
                    'uses'=>'HomeController@addEvenement'
                ]);

                Route::post('/valid/evenement', [
                    'as'=>'valid',
                    'uses'=>'HomeController@validEvenement'
                ]);
                
                Route::match(['get','post'],'/update/evenement/{id}', [
                    'as'=>'updateEvenement',
                    'uses'=>'HomeController@updateEvenement'
                ]);
                
                Route::get('/delete/evenement/{id}', [
                    'as'=>'deleteEvenement',
                    'uses'=>'HomeController@deleteEvenement'
                ]);
                
                //Gestion d'associations partenaires
                
                Route::get('/associations-partenaires', [
                'as'=>'listePartenaires',
                'uses'=>'HomeController@listePartenaires'
                ]);
                
                Route::get('/add/association-partenaire', [
                    'as'=>'ajouterPartenaire',
                    'uses'=>'HomeController@addPartenaire'
                ]);
                
                Route::post('/create/association-partenaire', [
                    'as'=>'createPartenaire',
                    'uses'=>'HomeController@createPartenaire'
                ]);
                
                Route::match(['get','post'],'/update/association-partenaire/{id}', [
                    'as'=>'updatePartenaire',
                    'uses'=>'HomeController@updatePartenaire'
                ]);
                
                Route::get('/delete/association-partenaire/{id}', [
                    'as'=>'deletePartenaire',
                    'uses'=>'HomeController@deletePartenaire'
                ]);
                

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

     Route::get('/panier/livraison', 
    ['as' => 'panier-adresse-livraison', function(){ 
         //Si le panier est vide on redirige vers l'accueil
         if(count(\Session::get('panier')) <= 0){
            return redirect()->route('accueil');
            //Siinon on affiche le formulaire pour l'adresse de livraison
        }else{
            return view('Paniers.formulaireCommande');  
        }
               
    }]);
    
    //On reçoit les données du formulaire pour l'adresse de livraison lors de la commande de revue(s)
    Route::match(['get','post'],'/panier/formulaire', [
        'as'=>'livraison',
        'uses'=>'PanierController@livraison'
    ]);
    
    //Route de test (tutoriel)
 /*   Route::get('/panier/order-detail', [
    'as'=>'order-detail',
    'uses'=>'PanierController@orderDetail'
    ]);*/
    
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

    
    //On reçoit les données du formulaire pour s'abonner à la revue
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
    
    

// Fabian**************************************************************************
//Pour formulaire de proposeArticle

Route::post('/publier/proposearticle',[
    'as'=>'ProposeArticle',
    'uses'=>'ArticleController@post'
]);
/*****************************************************/
    
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

