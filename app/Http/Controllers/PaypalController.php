<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use DateTime;


//Chargement des modèles
use App\Panier;
use App\RevuePanier;

class PaypalController extends BaseController{
    //Cette variable va contenir toute la configuration qu'on va utiliser
    private $_api_context;
    
    public function __construct(){
	// On va chercher les informations dans le fichier paypal.php qu'on a créé dans le dossier Config
	$paypal_conf = \Config::get('paypal');
	$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
	$this->_api_context->setConfig($paypal_conf['settings']);
    }
    //Dans la méthode postPayment on configure ce qui sera envoyé à Paypal
    public function postPayment(){
        $payer = new Payer();
	$payer->setPaymentMethod('paypal'); //Avec cette méthode on va configurer le type de paiement qui sera de type paypal
        
        $items = array();
	$subtotal = 0;
	$panier = \Session::get('panier'); //On obtiens toute l'info qu'on a dans le panier
	$currency = 'EUR';
        //On va configurer un objet item avec son nom, le type de monnaie, la description, la quantité et le prix
        foreach($panier as $producto){
			$item = new Item();
			$item->setName($producto->name)
			->setCurrency($currency)
			->setDescription($producto->extract)
			->setQuantity($producto->quantite)
			->setPrice(50);
        
//Ensuite on l'ajoute à l'array items qui sera rempli avec tous les objets Item avec leurs propriétés correspondantes            
			$items[] = $item;
			$subtotal += $producto->quantite * 50; //Et en même temps on va obtenir le sous-total qui est la quantité * le prix
		}
//On crée un autre objet de type ItemList dans lequel on va stocker le array qui contient le contenu du panier (les items)        
        $item_list = new ItemList();       
        $item_list->setItems($items); 
        
//On crée un objet de type Details qui va servier à ajouter des frais d'envoi si on le souhaite.
        $details = new Details();
	$details->setSubtotal($subtotal) //On lui ajoute le sous-total
		->setShipping(0);     //On lui ajoute les frais d'envoi
                
        $total = $subtotal + 0;    //On calcule le total à payer : le prix du panier + les frais d'envoi
        
//On crée ensuite un autre objet de la classe Amount qui va stocker les $details, le $currency et le $total  
        $amount = new Amount();
	$amount->setCurrency($currency)
		->setTotal($total)
		->setDetails($details);
        
//On crée un objet de la classe Transaction auquel on lui passe l'objet $amount qui contient la quantité, la monnaie et les détails concernant l'envoi   
        
        $transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list) //On lui passe l'objet qui contient tous les objets du paniers mais comme un objet de la classe ItemList
			->setDescription('Test de transaction dans mon Laravel App Store');
                
//On crée un autre objet de la classe RedirectUrls avec les méthodes setReturn Url et setCancelUrl lequels vont recevoir les routes dans les cas où le paiement serait validé ou annulé	
        $redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));
                
//On crée un objet de type Payment au travers duquel le paiement sera réalisé
       $payment = new Payment();
		$payment->setIntent('Sale') //de type vente directe
			->setPayer($payer)  //On lui passe l'objet de type payer préalablement créé
			->setRedirectUrls($redirect_urls) //On lui passe les urls
			->setTransactions(array($transaction));  //ainsi que l'objet de type Transaction
                
//Maintenant on va exécuter la méthode create de l'objet $payment et on le met à l'intérieur d'un try - catch
        try {
			$payment->create($this->_api_context); //C'est ici où se va exécuter la connexion à paypal à travers l'Api 
		} catch (\PayPal\Exception\PPConnectionException $ex) { //S'il existe un problème une exepction de type PPConnectionException sera lancée
			if (\Config::get('app.debug')) { //Si le debug est configuré les erreurs seront affichées
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Oups! Il y a eu un souci'); //Si le debug n'est pas configuré alors on aura ce message-ci
			}
		}
                
//Si tout s'est bien passé alors Paypal va nous envoyer certaines informations dont un lien destiné à l'utilisateur afin de s'identifier et poursuivre le paiement
       foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') { //Dans l'attribut rel du link il doit avoir 'approval_url' ce qui signifie que tout s'est bien déroulé
				$redirect_url = $link->getHref(); //On prend cet url et on la stocke dans la variable redirect_url qu'on va utiliser par après pour rediriger l'utilisateur vers le site de paypal
				break;
			}
		} 
//Dans la réponse de paypal il y a aussi un id qui permet de donner suite à la session de l'utilisateur. Cet id on va le stocker dans une variable de session
//et sera utilisé dans la méthode suivante afin de continuer de travailler avec la même information     
    // add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
                //Si tout s'est bien passé on aura la variable $redirect_url et on rédirige l'utilisateur à cet url de Paypal en utilisant la méthode away. La méthode away de Redirect permet de redirectionner à une url externe
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
		return \Redirect::route('panier-show') //Sinon on le redirige vers son panier avec un message
			->with('error', 'Oups! Erreur inconnue.');    
       
    }
    
    //Cette méthode concerne la réponse de Paypal
    
    public function getPaymentStatus(){
        // Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
		// clear the session payment ID
		\Session::forget('paypal_payment_id');
		$payerId = \Request::get('PayerID');
		$token = \Request::get('token');
		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('accueil')
				->with('message', 'Il y a eu un problème lors du paiement avec Paypal');
		}
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Request::get('PayerID'));
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved') { 
                 
                    //On fait appel à la fonction saveOrder pour faire l'insert
                    $this->saveOrder(\Session::get('panier'));
			\Session::forget('panier');
                        
			return \Redirect::route('accueil')
				->with('message', 'Transaction effectuée avec succès');
		}
		return \Redirect::route('accueil')
			->with('message', 'La transaction a été annulée');
    }
    
    //Pour faire l'insert dans la table paniers
    private function saveOrder($panier){
	    $subtotal = 0;
          //  $panier = \Session::get('panier');
            
	    foreach($panier as $item){
	        $subtotal += $item->quantite * 50;
	    }
            
            $now = new DateTime();
	    $order = Panier::create([
	        'total' => $subtotal,
	        'valide' => 1,
                'paye' => 1,
	        'dateCreation' => $now
	    ]);
	    
            //On va faire appel à la méthode saveOrderItem autant de fois que des items il y a dans le panier
	    foreach($panier as $item){
	        $this->saveOrderItem($item, $order->id);
	    }
	}
        
        private function saveOrderItem($item, $order_id){
		RevuePanier::create([
			'quantite' => $item->quantite,
			'prixHTVA' => 50 * $item->quantite,
			'revue_id' => $item->id,
			'panier_id' => $order_id
		]);
	}
        
        /* =================================================================================================================================
         * Paiement de la cotisation pour l'abonnement à la reuve
         ==================================================================================================================================*/
        
       public function postPaymentAbonnement($prix){
        $payer = new Payer();
	$payer->setPaymentMethod('paypal'); //Avec cette méthode on va configurer le type de paiement qui sera de type paypal

        
        $item1 = new Item(); 
        $item1->setName('Notre revue') 
                ->setCurrency('EUR') 
                ->setQuantity(1) 
                ->setPrice($prix); 

        
        $itemList = new ItemList(); 
        $itemList->setItems(array($item1));
        
        $details = new Details(); 
        $details->setShipping(0) 
                ->setSubtotal($prix);
        
        $amount = new Amount(); 
        $amount->setCurrency("EUR") 
                ->setTotal($prix) 
                ->setDetails($details);
        
        $transaction = new Transaction(); 
        $transaction->setAmount($amount) 
                ->setItemList($itemList) 
                ->setDescription("Payment description") 
                ->setInvoiceNumber(uniqid());
                
//On crée un autre objet de la classe RedirectUrls avec les méthodes setReturn Url et setCancelUrl lequels vont recevoir les routes dans les cas où le paiement serait validé ou annulé	
        $redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.abonnement.status'))
			->setCancelUrl(\URL::route('payment.abonnement.status'));
                
//On crée un objet de type Payment au travers duquel le paiement sera réalisé
       $payment = new Payment();
		$payment->setIntent('Sale') //de type vente directe
			->setPayer($payer)  //On lui passe l'objet de type payer préalablement créé
			->setRedirectUrls($redirect_urls) //On lui passe les urls
			->setTransactions(array($transaction));  //ainsi que l'objet de type Transaction
                
//Maintenant on va exécuter la méthode create de l'objet $payment et on le met à l'intérieur d'un try - catch
        try {
			$payment->create($this->_api_context); //C'est ici où se va exécuter la connexion à paypal à travers l'Api 
		} catch (\PayPal\Exception\PPConnectionException $ex) { //S'il existe un problème une exepction de type PPConnectionException sera lancée
			if (\Config::get('app.debug')) { //Si le debug est configuré les erreurs seront affichées
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Oups! Il y a eu un souci'); //Si le debug n'est pas configuré alors on aura ce message-ci
			}
		}
                
//Si tout s'est bien passé alors Paypal va nous envoyer certaines informations dont un lien destiné à l'utilisateur afin de s'identifier et poursuivre le paiement
       foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') { //Dans l'attribut rel du link il doit avoir 'approval_url' ce qui signifie que tout s'est bien déroulé
				$redirect_url = $link->getHref(); //On prend cet url et on la stocke dans la variable redirect_url qu'on va utiliser par après pour rediriger l'utilisateur vers le site de paypal
				break;
			}
		} 
//Dans la réponse de paypal il y a aussi un id qui permet de donner suite à la session de l'utilisateur. Cet id on va le stocker dans une variable de session
//et sera utilisé dans la méthode suivante afin de continuer de travailler avec la même information     
    // add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
                //Si tout s'est bien passé on aura la variable $redirect_url et on rédirige l'utilisateur à cet url de Paypal en utilisant la méthode away. La méthode away de Redirect permet de redirectionner à une url externe
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
		return \Redirect::route('panier-show') //Sinon on le redirige vers son panier avec un message
			->with('error', 'Oups! Erreur inconnue.');    
       
    }
    
    
     //Cette méthode concerne la réponse de Paypal
    
    public function getPaymentAbonnementStatus(){
        // Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
		// clear the session payment ID
		\Session::forget('paypal_payment_id');
		$payerId = \Request::get('PayerID');
		$token = \Request::get('token');
		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('accueil')
				->with('message', 'Il y a eu un problème lors du paiement avec Paypal');
		}
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Request::get('PayerID'));
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved') { 
                    return \Redirect::route('accueil')
				->with('message', 'Transaction effectuée avec succès. Félicitations vous êtes désormais abonné à notre revue.');
		}
		return \Redirect::route('accueil')
			->with('message', 'La transaction a été annulée');
    }
    
}
