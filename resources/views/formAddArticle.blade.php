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


            <form action="{{ route('valid') }}" method="post">
            
            <fieldset>
                <legend>Ajouter un article</legend>
                <div class="input-field"><label for="titre">Titre</label>
                     <input type="text" id="titre" class="validate" required="required" name="titre" value="{{ old('titre') }}" />
                </div>
                <div class="input-field"><label for="titre">Slug</label>
                     <input id="slug" class="validate" required="required" type="text"  name="slug" value="{{ old('slug') }}" />
                </div>
               <div class="input-field"><label for="texte">Texte</label>
                    <textarea id="texte" class="materialize-textarea validate" required="required" name="texte">{{ old('texte') }}</textarea>
                </div>
             
                  
                  <input type='hidden' name='_token' value='{{ csrf_token() }}'/>

                  
                <div> <!--Validation du formulaire-->
                    <button class="btn waves-effect waves-light" type="submit" name="action">Valider
                    </button>
                </div>
            </fieldset>
        </form> 
      
@endsection               


@push('javascript')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
@endpush
