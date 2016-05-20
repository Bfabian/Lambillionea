@extends ('../Template.layout')

@section('titre') @endsection

@section('contenu')

<div class="z-depth-3">
    <div class="container">
        <div class="section">
            <div class="row">
                <h2 class="josefin-bold">Mon panier</h2>
                    @if(count($panier))

                
                <!--TABLE-->
                        <div class='center-align margin-bottom-30'>
                            <a class='waves-effect waves-light btn-large' href="{{route('panier-trash') }}"><i class='material-icons'>delete</i> VIDER LE PANIER</a>
                        </div>
         
                        <table class="responsive-table centered highlight table-bordered marge-ext-inferieure-medium">
                            <thead>
                                <tr class="josefin-bold">
                                    <th>Couverture</th>
                                    <th>Exemplaire</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Sous-total</th>
                                    <th>Retirer du panier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($panier as $item)
                                <tr>
                                    <td><img class="activator margin-10" src="{{ asset('media/revue-01.jpg') }}"></td>
                                    <td>LAMBILLIONEA <br/>Tome : {{ $item->tome }}, N° {{ $item->fascicule }}, Année: {{ $item->annee }}</td>
                                    <td>50€</td>
                                    
                                    <td>
                                        
                                        <select id="revue_{{ $item->id }}" name="quantite" class='btn-update-item' data-href='{{route('panier-update', ['revue'=>$item->id]) }}' data-id='{{ $item->id }}' style="display:block">             
                                            <option <?php if ( 1 == $item->quantite) { echo 'selected="selected"';} ?> value="1">1</option>
                                            <option <?php if ( 2 == $item->quantite) { echo 'selected="selected"';} ?> value="2">2</option>
                                            <option <?php if ( 3 == $item->quantite) { echo 'selected="selected"';} ?> value="3">3</option>
                                            <option <?php if ( 4 == $item->quantite) { echo 'selected="selected"';} ?> value="4">4</option>
                                            <option <?php if ( 5 == $item->quantite) { echo 'selected="selected"';} ?> value="5">5</option>
                                        </select>
                                    </td>
                                    
                                    <td>{{ number_format(50 * $item->quantite, 2) }} €</td>
                                    <td><a href="{{route('panier-delete',['revue'=>$item->id]) }}" class="btn btn-danger">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="green lighten-2">
                                    <td colspan="6"><h5 class="josefin-bold white-text right">TOTAL : <span>{{ number_format($total,2) }} €</span></h5></td>
                                </tr>
                            </tbody>
                            
                        </table>
                   
                       <!-- <h5 class="josefin-bold right">TOTAL : <span>{{ number_format($total,2) }} €</span></h5>-->
                        
                        @else
                        
                        <div class='card-panel'><h3 class='josefin-regular'>Votre panier d'achats est vide :-(</h3></div>                        
                        
                        @endif
                        
              
                <div class="centered col s12">
                    
                    <a class="waves-effect waves-light btn-large" href="{{route('listeRevues') }}"><i class="material-icons left">reply</i>RETOURNER VERS LE CATALOGUE</a>
                    
                    <a class="waves-effect waves-light btn-large" href="{{route('panier-adresse-livraison') }}">CONTINUER <i class="material-icons right">send</i></a>
                </div>
              

            </div>
        </div>
    </div>
</div>

@endsection

@push('javascript')
<script>
     //Gestion des quantités du panier

    
    /*$('.btn-update-item').on('click', function(e){
        e.preventDefault();
        
        var id = $(this).data('id');
        var href = $(this).data('href');
        var quantite = $('#revue_'+ id).val();
        
        window.location.href = href + "/" + quantite;
    });*/
    
    
    //Test Select
    
    $('.btn-update-item').on('change', function(e){
        e.preventDefault();
       
        var id = $(this).data('id');
        var href = $(this).data('href');
        var quantite = $('#revue_'+ id).val();
        
     //   var quantite = $('.btn-update-item').options[$('.btn-update-item').selectedIndex].val();
       // alert(quantite);
         
      //  parseInt($('#revue_'+ id).options[$('#revue_'+ id).selectedIndex].text);
      
     //var valeurselectionnee = $('.btn-update-item').options[$('.btn-update-item').selectedIndex].val();

      
        window.location.href = href + "/" + quantite;
    });
    
        /*  function calcul(){
                var liste1 = document.getElementById("select1");
                var texte1 = parseInt(liste1.options[liste1.selectedIndex].text);

                var liste2 = document.getElementById("select2");
                var texte2 = parseInt(liste2.options[liste2.selectedIndex].text);
              
                 var total = texte1+texte2;
                 document.getElementById("total2").value = total;                         
            };
            
            document.getElementById('select1').onchange = function(){               
                calcul();                
            };
            
             document.getElementById('select2').onchange = function(){
                calcul();
            };*/
</script>
  @endpush
