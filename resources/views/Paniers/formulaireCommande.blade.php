@extends ('../Template.layout')


@section('contenu')
<div class="z-depth-3">
    <div class="container">
        <div class="section">
            <div class="row">
                <h1 class="josefin-bold">Adresse de livraison</h1>
                <nav class="light-green lighten-2">
                    <div class="nav-wrapper ">
                        <div class="col s12">
                            <a href="#" class="breadcrumb">1. Adresse de livraison</a>
                            <a href="#" class="breadcrumb">2. Détail commande</a>
                            <a href="#" class="breadcrumb">3. Validation</a>
                        </div>       
                  </div>  
           
                </nav>
                <div class="card-panel lighten-2">
                 <form action="{{ route('livraison') }}" method="post">
                    <fieldset>
                        <legend>Merci de renseigner vos coordonnées et une adresse de livraison</legend>
                         <div class="input-field ">
                            <span>Civilité</span>
                            <select id="civilite" name="civilite" style="display:block">
                                <option value="Monsieur">Monsieur</option>
                                <option value="Monsieur">Madame</option>
                                <option value="Monsieur">Mademoiselle</option>
                            </select>
                        </div>
                        <div class="input-field"><label for="nom">Nom</label>
                            <input type="text" id="nom" class="validate" required="required" name="nom" value="{{ old('nom') }}" />
                        </div>
                        <div class="input-field"><label for="rue">Prénom</label>
                            <input type="text" id="prenom" class="validate" required="required" name="prenom" value="{{ old('prenom') }}" />
                        </div>
                        <div class="input-field"><label for="rue">Rue et numero</label>
                            <input type="text" id="rue" class="validate" required="required" name="rue" value="{{ old('rue') }}" />
                        </div>
                        <div class="input-field"><label for="cp">Code postal</label>
                            <input id="cp" class="validate" required="required" type="text"  name="cp" value="{{ old('cp') }}" />
                        </div>
                        <div class="input-field"><label for="ville">Ville</label>
                            <input id="ville" class="validate" required="required" type="text"  name="ville" value="{{ old('ville') }}" />
                        </div>
                        <div class="input-field"><label for="pays">Pays</label>
                            <input id="pays" class="validate" required="required" type="text"  name="pays" value="{{ old('pays') }}" />
                        </div>

                              <input type='hidden' name='_token' value='{{ csrf_token() }}'/>

                            <div> <!--Validation du formulaire-->
                                <button class="btn waves-effect waves-light" type="submit" name="action">Je valide mon adresse</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div> 
        </div>
    </div> 
@endsection               


@push('javascript')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
@endpush
