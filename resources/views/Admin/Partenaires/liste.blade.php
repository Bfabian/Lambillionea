@extends('../../layouts.app')

@section('content')

        <div class="col-md-12">
  
                <a class="btn btn-warning" href="{{url('admin/add/association-partenaire') }}">
                    <span class="glyphicon glyphicon-upload"></span> Ajouter une association partenaire
                </a>

            
            <div class="panel panel-default">
                
                <table class=" table striped">
                    <thead>
                        <tr>
                            <th data-field="name">Associations Partenaires</th>                                     
                            <th data-field="name">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($partenaires as $partenaire)
                        <tr>
                             <td>
                                 <h5 class="josefin-regular">{{ $partenaire->nom }}</h5>
                                 <p>Adresse : {{ $partenaire->adresse }}
                                 <br>Email : {{ $partenaire->email }}
                                 <br>Téléphone(s) : {{ $partenaire->telephone }}
                                 <br>Site internet : <a href="#">{{ $partenaire->url }}</a></p>
                                 <p>Personne de contact : {{ $partenaire->personneContact }}</p>
                                 <p>Brève description : {{ $partenaire->description }}</p>
                            </td>
                            <td>
                                <a href="{{route('updatePartenaire',['id'=>$partenaire->id]) }}"> <span class='glyphicon glyphicon-cog'></span> Modifier</a>  -  
                                <a href="{{route('deletePartenaire',['id'=>$partenaire->id]) }}"> <span class='glyphicon glyphicon-trash'></span> Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
               </table> 
            </div>
        </div>

@endsection


