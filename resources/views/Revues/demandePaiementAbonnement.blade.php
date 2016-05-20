@extends ('../Template.layout')

@section('titre') @endsection

@section('contenu')

<div class="z-depth-3">
    <div class="container">
        <div class="section">
            <div class="row">
                <h2 class="josefin-bold">Votre demande d'abonnement</h2>

                <section class="col s12">
                    <h4 class="josefin-regular">Nous avons bien enregistré vos coordonéés et vous remercions de l'intérêt que vous portez à notre ASBL !</h4>
                    <p>Afin de compléter la procédure d'abonnement à notre revue, nous vous invitons de verser une première cotisation en versant la somme de : <span class="josefin-bold"> {{ number_format($prix,2) }} €</span> pour {{ $pays}}</p>
                    
                     <a class="waves-effect waves-light btn-large right" href="{{ route('paymentAbonnement',['prix'=>$prix]) }}">CONTINUER AVEC PAYPAL<i class="material-icons right">send</i></a>
                </section>
            </div>
             </div>
         </div>
     </div>

@endsection
                     
