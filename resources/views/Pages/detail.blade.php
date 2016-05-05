@extends ('../Template.layout')

@section('titre') @endsection

@section('contenu')

<!--Confirmation dans le cas où les données du formulaire ont bien été enregistrées-->
@if (count($errors) <= 0)

  {{ session('status') }}

@endif
<!---->

    <h1>{{ $rubrique->titre}}</h1>
    <p>{{ $rubrique->texte}}</p>
    
    
    <h2>La liste des articles</h2>
    
     @include('Articles.liste')
     

@endsection


