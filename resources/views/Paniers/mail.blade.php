<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nouvelle commande</title>

    </head>
    <body>  
        
    <h1>Nouvelle commande</h1>
    <section>
    <h2>Coordonnées du client</h2>
        <p>{{ $client['civilite'] }}</p>
        <p>{{ $client['nom'] }}</p>
        <p>{{ $client['prenom'] }}</p>
        <p>{{ $client['rue'] }}</p>
        <td>{{ $client['cp'] }}</p>
        <p>{{ $client['ville'] }}</p>
        <p>{{ $client['pays'] }}</p>
        
        <p>Numero de transaction paypal : {{ $numeroTransaction }}</p>
        </section>
        <section>
            <table class="responsive-table centered highlight table-bordered marge-ext-inferieure-medium">
                    <thead>
                        <tr class="josefin-bold">
                            <th>Exemplaire</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Sous-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($panier as $item)
                        <tr>
                            <td>LAMBILLIONEA <br/>Tome : {{ $item->tome }}, N° {{ $item->fascicule }}, Année: {{ $item->annee }}</td>
                            <td>50 €</td>
                            <td>{{$item->quantite}}</td>
                            <td>{{ number_format(50 * $item->quantite, 2) }} €</td>
                        </tr>
                        @endforeach
                        <tr class="green lighten-2">
                            <td colspan="4"><h5 class="josefin-bold white-text right">TOTAL : {{ number_format($total,2) }} €</h5></td>
                        </tr>
                    </tbody>
                            
                </table> 
        </section>
    </body>
</html>