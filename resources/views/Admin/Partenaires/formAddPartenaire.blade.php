@extends('../layouts.app')

@section('content')

@if (count($errors) > 0)
                    
        <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
 @endif
   
    <form class="form-horizontal" action="{{ isset($partenaire->id) ? route('updatePartenaire',['id'=>$partenaire->id]) : route('createPartenaire') }}" method="post">
        <fieldset>
            <legend>{{ isset($partenaire->id) ? 'Modifier une association partenaire' : 'Ajouter une association partenaire' }}</legend>
                <div class="form-group">
                    <label for="nom" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="nom" required="required" name="nom" value="{{ $partenaire->nom or '' }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="adresse" class="col-sm-2 control-label">Adresse Postale</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="adresse" required="required" type="text"  name="adresse" value="{{ $partenaire->adresse or '' }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="url" class="col-sm-2 control-label">Site Web</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="url" required="required" type="text"  name="url" value="{{ $partenaire->url or '' }}" />
                    </div>
                </div>               
                <div class="form-group">
                    <label for="personneContact" class="col-sm-2 control-label">Personne de contact</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="personneContact" type="text"  name="personneContact" value="{{ $partenaire->personneContact or '' }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="telephone" class="col-sm-2 control-label">Téléphone</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="telephone" type="text"  name="telephone" value="{{ $partenaire->telephone or '' }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="email" type="text"  name="email" value="{{ $partenaire->email or '' }}" />
                    </div>
                </div>
            
               <div class="form-group">
                   <label for="description" class="col-sm-2 control-label">Brève description</label>
                   <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description">{{ $partenaire->description or '' }}</textarea>
                   </div>
                </div>
             
                  <input type="hidden" name="id" value="{{ $partenaire->id or '' }}"/> 
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


