@extends('../layouts.app')

@section('content')

<!--Lister les erreurs éventuelles-->
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif(session('status'))
<h1>{{ session('status') }}</h1>
@endif


    <form class="form-horizontal" action="{{ isset($evenement->id) ? route('updateEvenement',['id'=>$evenement->id]) : route('valid') }}" method="post">
        <fieldset>
            <legend>{{ isset($evenement->id) ? 'Modifier un évènement' : 'Ajouter un évènement' }}</legend>
                <div class="form-group">
                    <label for="titre" class="col-sm-2 control-label">Titre</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="titre" class="validate" required="required" name="titre" value="{{ $evenement->titre or '' }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="dateEvent" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="dateEvent" class="" required="required" type="text"  name="dateEvent" value="{{ $evenement->dateEvent or '' }}" />
                    </div>

                    <label for="heureDebut" class="col-sm-2 control-label">Heure</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="heureDebut" class="" required="required" type="text"  name="heureDebut" value="{{ $evenement->heureDebut or '' }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="lieu" class="col-sm-2 control-label">Lieu</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="lieu" class="" required="required" type="text"  name="lieu" value="{{ $evenement->lieu or '' }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="adresse" class="" required="required" type="text"  name="adresse" placeholder="rue et numero" value="{{ $evenement->adresse or '' }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Téléphone</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="telephone" class="" required="required" type="text"  name="telephone" value="{{ $evenement->telephone or '' }}" />
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" placeholder="Email" class="form-control" id="email" class="" required="required" name="email" value="{{ $evenement->email or '' }}" />
                    </div>
                </div>
            
               <div class="form-group">
                   <label for="description" class="col-sm-2 control-label">Description</label>
                   <div class="col-sm-10">
                        <textarea class="form-control" id="description" class="" required="required" name="description">{{ $evenement->description or '' }}</textarea>
                   </div>
                </div>
             
                  <input type="hidden" name="id" value="{{ $evenement->id or '' }}"/> 
                  <input type='hidden' name='_token' value='{{ csrf_token() }}'/>
                 
                <!--Validation du formulaire-->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="action">Valider</button>
                    </div>
                </div>
                       
            </fieldset>
        </form> 




@endsection               


