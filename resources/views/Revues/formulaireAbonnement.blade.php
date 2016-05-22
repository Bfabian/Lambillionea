<!--Lister les erreurs éventuelles-->


    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="row">
                
                @if (Session::get('submitted'))
                    <!--S'il y a des erreurs dans le formulaire on reouvre la boite modale avec le formulaire et on affiche les erreurs-->
                    <script>

                      $(function() {
                            $('#modal4').openModal();
       
                        });

                    </script>
                @endif
                
                @if (count($errors) > 0)
                <script>
                    
                    $('#modal1').openModal();
                      
                    </script>
                    
                    <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                @endif
                
                <div class="col s6">
                    <h4 class="josefin-bold">DEVENIR MEMBRE</h4>
                    <p>Vous n'êtes pas encore membre de notre association et vous souhaitez en devenir adhérent ainsi que recevoir notre revue ?
                       <br><br>
                       Rien de plus simple, il vous suffit de complèter le formulaire ci-contre et de verser une cotisation annuelle de 55€ (pour la Belgique) ou de 65€ (résidant européen) ou de 75€ (pour le reste du monde).
                       <br><br>
                       En plus de recevoir notre newsletter et notre revue, cette côtisation vous offre la possibilité de soumettre vos propres articles pour une publication au sein de la revue.
                       <br><br>
                       Paiement par PayPal ou virement banquaire.
                    </p>
                    
                </div>
                
                <div class="col s6">
                    <h4 class="josefin-bold">INSCRIPTION</h4>
                    <form action="{{ route('abonnement-revues') }}" method="post">
                    <div class="row">
                        <div class="input-field col s16">
                            <label for="nom">Nom</label>
                            <input id="nom" class="validate" required="required" type="text"  name="nom" value="{{ old('nom') }}" />
                        </div>
                        <div class="input-field col s16">
                            <label for="prenom">Prénom</label>
                            <input id="prenom" class="validate" required="required" type="text"  name="prenom" value="{{ old('prenom') }}" />
                        </div>
                        
                        <div class="input-field col s12">
                            <label for="email">Adresse Email</label>
                            <input id="email" class="validate" required="required" type="text"  name="email" value="{{ old('email') }}" />
                        </div>
                        
                        <div class="input-field col s12">
                            <label for="adresse">Adresse Postale</label>
                            <input id="adresse" class="validate" required="required" type="text"  name="adresse" value="{{ old('adresse') }}" />
                        </div>

                         <div class="input-field col s12">
                            <label for="ville">Ville</label>
                            <input id="ville" class="validate" required="required" type="text"  name="ville" value="{{ old('ville') }}" />
                        </div>
                        
                        <select name="pays" id="pays" style="display:block">
                            <option value="Allemagne">Allemagne</option>
                            <option value="Autriche">Autriche</option>
                            <option value="Belgique">Belgique</option>
                            <option value="Bulgarie">Bulgarie</option>
                            <option value="Chypre">Chypre</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Colombie">Colombie</option>
                            <option value="Croatie">Croatie</option>
                            <option value="Danemark">Danemark</option>                           
                            <option value="Espagne">Espagne</option>
                            <option value="Estonie">Estonie</option>
                            <option value="États-Unis">États-Unis</option>
                            <option value="Finlande">Finlande</option>
                            <option value="France">France</option>
                            <option value="Grèce">Grèce</option>
                            <option value="Hongrie">Hongrie</option>
                            <option value="Irlande">Irlande</option>
                            <option value="Italie">Italie</option>
                            <option value="Lettonie">Lettonie</option>
                            <option value="Lituanie">Lituanie</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Malte">Malte</option>
                            <option value="Mexique">Mexique</option>
                            <option value="Pays-Bas">Pays-Bas</option>
                            <option value="Pologne">Pologne</option>
                            <option value="Portugal">Portugal</option>
                            <option value="République tchèque">République tchèque</option>
                            <option value="Roumanie">Roumanie</option>
                            <option value="Royaume-Uni">Royaume-Uni</option>
                            <option value="Slovaquie">Slovaquie</option>
                            <option value="Slovénie">Slovénie</option>
                            <option value="Suède">Suède</option>
                            <option value="Turquie">Turquie</option>

                        </select>
                      
                        <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
                        &nbsp;
                        
                        <div> <!--Validation du formulaire-->
                            <button id='modal' class="btn waves-effect waves-light" type="submit" name="action">Je m'inscris
                            </button>
                        </div>
                    </div>
                        
                    </form>
                </div>
          </div>
            
        </div>
        <div class="modal-footer left">
      
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">Retour</a>
        </div>
    </div>  




<!--Modal 4-->
         

<div id="modal4" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="row">
                <div class="col s12">
                    <h4 class="josefin-bold">VOTRE COMMANDE </h4>
                </div>
                <div class="col s6">
                    <h5>Paiement PayPal</h5>
                    <p>Afin de compléter la procédure d'abonnement à notre revue, nous vous invitons de verser une première cotisation 
                        en versant la somme de : {{$prix = session('prix') }} 
                        
                        <a href="{{ route('paymentAbonnement',['prix'=>$prix]) }}"><img src="{{ asset('media/paypal.png') }}" alt="paypal"></a>
                    <br></p>
                    
                </div>
                <div class="col s6">
                    <h5>Paiement par virement</h5>
                    <p>Union des Entomologistes Belges / Lambillionea :
                    <br>57 rue Genot, B-4032, Chênée, Belgique
                    <br>Pour la Belgique :
                    <br>BE38 7925 8328 2472</p>
                    
                    <div>
                        <p>Pour l'étranger
                        <br>Utiliser codes SWIFT-BIC, IBAN 
                        <br>et/ou frais à charge du payeur
                        <br>N° IBAN : BE38-7925-8328-2472</p>
                    </div>
                    
                    <div>
                        <p>Foreign bank transfer 
                        <br>Use the SWIFT-BIC, IBAN codes 
                        <br>and/or charge for the buyer
                        <br>SWIFT/BIC : GKCCBEBB</p>
                    </div>
                </div>
                
          </div>
            
        </div>
        <div class="modal-footer left">
            <a href="{{ route('paymentAbonnement',['prix'=>$prix]) }}" class="modal-action modal-close waves-effect waves-green btn-flat">Payez </a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">retour</a>
        </div>
    </div>

