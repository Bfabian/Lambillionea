<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Demande d'abonnement à la revue</title>

    </head>
    <body>  
        
    <h1>Demande d'abonnement à la revue</h1>
    
        <p>Nom : {{$nom}}</p>
        <p>Prénom : {{$prenom}}</p>
        <p>Email : {{$email}}</p>
        <p>Adresse postale : {{$adresse}}</p>
        <p>Ville : {{$ville}}</p>
        <p>Pays : {{$pays}}</p>
        
        <p>Numero de transaction paypal : {{$numeroTransaction}}</p>

    </body>
</html>