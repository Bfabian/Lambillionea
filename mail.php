<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
GLOBAL $contenu;
//Je démarre le tampon
ob_start();
?> 
    <?php
   if (isset($_GET['mail'])) {
       $msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement
remplis :<br/><br/>";
       $msg_ok = "Votre demande a bien été prise en compte.";
       $message = $msg_erreur;
       define('MAIL_DESTINATAIRE', 'benfarris40@gmail.com '); // remplacer par votre email
       define('MAIL_SUJET', 'commande');


// vérification des champs
       if (empty($_POST['prenom']))
           $message .= "Votre prénom<br/>";
       if (empty($_POST['nom']))
           $message .= "Votre nom<br/>";
       if (empty($_POST['adresse']))
           $message .= "Votre adresse<br/>";
       if (empty($_POST['postale']))
           $message .= "Votre code postal<br/>";
       if (empty($_POST['ville']))
           $message .= "Votre ville<br/>";
       if (empty($_POST['telephone']))
           $message .= "Votre message<br/>";

// si un champ est vide, on affiche le message d'erreur et on stoppe le script
       if (strlen($message) > strlen($msg_erreur)) {
           echo $message;
           die();
       }

// sinon c'est ok => on continue
       foreach ($_POST as $index => $valeur) {
           $$index = stripslashes(trim($valeur));
       } ?>

       <?php
       $interets = $_SESSION['panier'];
       $sqlinterets = '';
       /*for ($i=0; $i<count($interets); $i++)
       {
         $sqlinterets .= $interets[$i];
         $sqlinterets .= ', ';
       }*/

//Préparation de l'entête du mail:
       $mail_entete = "MIME-Version: 1.0\r\n";
       $mail_entete .= "From: {$_POST['nom']} "
           . "<{$_POST['email']}>\r\n";
       $mail_entete .= 'Reply-To: ' . $_POST['email'] . "\r\n";
       $mail_entete .= 'Content-Type: text/html; charset="utf-8"';
       $mail_entete .= "\r\nContent-Transfer-Encoding: 8bit\r\n";
       $mail_entete .= 'X-Mailer:PHP/' . phpversion() . "\r\n";
       $mail_entete .= "from: benfarris40@gmail.com\r\nCc:benfarris40@gmail.com";

// préparation du corps du mail
       $mail_corps ='<table><tbody><tr><td><img height=" 100px;" src="http://bfarris.be/img/lvshop.png"></td><td></td><td><img height="100px" src="http://bfarris.be/img/vt.png"></td></tr><tr><td>LV Shop - VT-Services SNC Groupe N° Entreprise: BE0597-900-773 - ING: BE29-363-1448913-64</td><td></td></tr><tr></tr></tbody></table></br>';
       $mail_corps .= "Message de : $prenom $nom\n";
       $mail_corps .= "Numéro de téléphone :$telephone\n  ";
       $mail_corps .= "Adresse : $adresse, $postale $ville, $pays\n";
       $mail_corps .= "Sa commande : $sqlinterets\n\n\n";
       $mail_corps .= '<table><thead><th>Nom</th><th>nombre</th><th>Sous-total</th></thead>';
//$mail_corps .= $comments;
       $ids = array_keys($_SESSION['panier']);
       if (empty($ids)) {
           $products = array();
       } else {
           $products = $DB->query('SELECT * FROM produits WHERE id IN (' . implode(',', $ids) . ')');
       }
       foreach ($products as $product) {
           $mail_corps .=  '<tbody><tr><td>'.$product->nom.'</td>';

           $mail_corps .= '<td>' . $_SESSION['panier'][$product->id].'</td>';
           $mail_corps .= '<td>' . $product->prixLV * $_SESSION['panier'][$product->id] . ' € ' . " </td></tbody>\r\n";


           ?><?php }
       $mail_corps .= '<tfoot ><tr></tr><tr>
        <td>Frais de livraison et administratif : '. $panier->soustotal().' € </td></tr><tr>
      <td>Si c\'est votre première commande : 25€ de frais administratif vous serons demandé.</td>
  </tr>
  <tr>
   
				<td>Grand Total (prix+tarif lvShop) = '. $panier->total() .' € </td><td >
			</td>

  </tr>
		</tfoot>' ;
       $mail_corps .='</table>';?>

       <?php
// envoi du mail
       if (mail(MAIL_DESTINATAIRE,  MAIL_SUJET, $mail_corps, $mail_entete)) {

           mail($email, MAIL_SUJET, $mail_corps, $mail_entete);
           //Le mail est bien expédié
           echo '
  <section class="row card-panel grey lighten-5 z-depth-1">
    <h3 class="center-align s12">Merci pour votre commande ! </h3>
    <p class="center-align"> Vous serez recontacté le plus rapidement possible par un de nos collaborateurs. 
    </p>

    
       <div class="row card-panel grey lighten-5 z-depth-1 ">
    <p class="col l10 s12 center-align">Le message a été correctement  envoyé</p>
    <div class="col l2 s12 center-align">
        <a class="waves-effect waves-light btn " href="' . ROOT_APP . '">Home</a>
    </div> 
</div>
        </a>
    </section>

';


// Détruit toutes les variables de session
           $_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !


// Finalement, on détruit la session.
           session_destroy();

           $panier = new panier($connexion);

       } else {
           //Le mail n'a pas été expédié
           echo "Une erreur est survenue lors de l'envoi du formulaire par email";
       }

   }
elseif (isset($_GET['contact'])){
    $msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement
remplis :<br/><br/>";
    $msg_ok = "Votre demande a bien été prise en compte.";
    $message = $msg_erreur;
    define('MAIL_DESTINATAIRE', 'benfarris40@gmail.com'); // remplacer par votre email
    define('MAIL_SUJET', 'contact ');


// vérification des champs
    if (empty($_POST['prenom']))
        $message .= "Votre prénom<br/>";
    if (empty($_POST['nom']))
        $message .= "Votre nom<br/>";
    if (empty($_POST['adresse']))
        $message .= "Votre adresse<br/>";
    if (empty($_POST['postale']))
        $message .= "Votre code postal<br/>";
    if (empty($_POST['ville']))
        $message .= "Votre ville<br/>";
    if (empty($_POST['telephone']))
        $message .= "Votre message<br/>";

// si un champ est vide, on affiche le message d'erreur et on stoppe le script
    if (strlen($message) > strlen($msg_erreur)) {
        echo $message;
        die();
    }

// sinon c'est ok => on continue
    foreach ($_POST as $index => $valeur) {
        $$index = stripslashes(trim($valeur));
    } ?>

    <?php



//Préparation de l'entête du mail:
    $mail_entete = "MIME-Version: 1.0\r\n";
    $mail_entete .= "From: {$_POST['nom']} "
        . "<{$_POST['email']}>\r\n";
    $mail_entete .= 'Reply-To: ' . $_POST['email'] . "\r\n";
    $mail_entete .= 'Content-Type: text/plain; charset="utf-8"';
    $mail_entete .= "\r\nContent-Transfer-Encoding: 8bit\r\n";
    $mail_entete .= 'X-Mailer:PHP/' . phpversion() . "\r\n";

// préparation du corps du mail
    $mail_corps = "Message de : $prenom $nom\n";
    $mail_corps .= "Numéro de téléphone :$telephone et sa société s'il en a une : $societe \n  ";
    $mail_corps .= "Adresse : $adresse, $postale $ville, $pays\n";
    $mail_corps .= "Adresse mail : $email\n";
    $mail_corps .= "Son message : $commentaire\n\n\n";
?>


    <?php
// envoi du mail
    if (mail(MAIL_DESTINATAIRE, MAIL_SUJET, $mail_corps, $mail_entete)) {
        //Le mail est bien expédié
        echo '
  <section class="row card-panel grey lighten-5 z-depth-1">
    <h3 class="center-align s12">Merci pour votre demande ! </h3>
    <p class="center-align"> Vous serez recontacté le plus rapidement possible par un de nos collaborateurs.
    </p>


       <div class="row card-panel grey lighten-5 z-depth-1 ">
    <p class="col l10 s12 center-align">Le message a été correctement  envoyé</p>
    <div class="col l2 s12 center-align">
        <a class="waves-effect waves-light btn " href="' . ROOT_APP . '">Home</a>
    </div>
</div>
        </a>
    </section>

';


// Détruit toutes les variables de session


// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !


// Finalement, on détruit la session.
        session_destroy();

        $panier = new panier($connexion);

    } else {
        //Le mail n'a pas été expédié
        echo "Une erreur est survenue lors de l'envoi du formulaire par email";
    }
}
    
     //Je mets le contenu du tampon dans une variable  
$contenu = ob_get_clean();

    ?>