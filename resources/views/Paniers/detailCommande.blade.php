@extends ('../Template.layout')

@section('titre') @endsection

@section('contenu')

<div class="z-depth-3">
    <div class="container">
        <div class="section">
            <div class="row">
                 <h1 class="josefin-bold">Le détail de votre commande</h1>
                <nav class="light-green lighten-2">
                    <div class="nav-wrapper ">
                        <div class="col s12">
                            <a href="#" class="breadcrumb">1. Adresse de livraison</a>
                            <a href="#" class="breadcrumb">2. Détail commande</a>
                            <a href="#" class="breadcrumb">3. Validation</a>
                        </div>       
                  </div>            
                </nav>
                 

            <div class="col s6">  
                <h4>Données de livraison</h4>
                <table class="responsive-table centered highlight table-bordered marge-ext-inferieure-medium">
                    <thead>
                        <tr class="josefin-bold">
                            <th>Civilité</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Rue et numéro</th>
                            <th>Code postal</th>
                            <th>Ville</th>
                            <th>Pays</th>
                        </tr>
                    </thead>
                    <tbody>
              
                        <tr>
                            <td>{{ $client['civilite'] }}</td>
                            <td>{{ $client['nom'] }}</td>
                            <td>{{ $client['prenom'] }}</td>
                            <td>{{ $client['rue'] }}</td>
                            <td>{{ $client['cp'] }}</td>
                            <td>{{ $client['ville'] }}</td>
                            <td>{{ $client['pays'] }}</td>
                        </tr>
                    </tbody>
                            
                </table> 
            </div>
                 
             <div class="col s6">  
                <h4>Détail du panier</h4>
                <table class="responsive-table centered highlight table-bordered marge-ext-inferieure-medium">
                    <thead>
                        <tr class="josefin-bold">
                            <th>Couverture</th>
                            <th>Exemplaire</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Sous-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($panier as $item)
                        <tr>
                            <td><img class="activator margin-10" src="{{ asset('media/revue-01.jpg') }}"></td>
                            <td>LAMBILLIONEA <br/>Tome : {{ $item->tome }}, N° {{ $item->fascicule }}, Année: {{ $item->annee }}</td>
                            <td>50 €</td>
                            <td>{{$item->quantite}}</td>
                            <td>{{ number_format(50 * $item->quantite, 2) }} €</td>
                        </tr>
                        @endforeach
                        <tr class="green lighten-2">
                            <td colspan="5"><h5 class="josefin-bold white-text right">TOTAL : <span>{{ number_format($total,2) }} €</span></h5></td>
                        </tr>
                    </tbody>
                            
                </table> 
            </div>    
          
            
            <div class="centered col s12">
                <a class='waves-effect waves-light btn-large' href="{{route('payment') }}"><i class="material-icons right">send</i>VALIDER LA COMMANDE</a>   
            </div>
              

            </div>
        </div>
    </div>
</div>

@endsection

