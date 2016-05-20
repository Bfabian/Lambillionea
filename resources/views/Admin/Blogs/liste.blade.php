@extends('../../layouts.app')

@section('content')

        <div class="col-md-12">
            
             @if(\Session::has('success'))
            <div class='alert alert-success'>{{ session('success') }}</div>
            @endif
  
                <a class="btn btn-warning" href="{{url('admin/add/evenement') }}">
                    <span class="glyphicon glyphicon-upload"></span> Ajouter un événement
                </a>

            
            <div class="panel panel-default">
                
                <table class=" table striped">
                    <thead>
                        <tr>
                            <th data-field="name">Date</th>
                            <th data-field="name">Evénements</th>                                     
                            <th data-field="name">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $blog->dateEvent }}</td>
                             <td>
                                 <h5 class="josefin-regular">{{ $blog->titre }}</h5>
                                 <p>{{ $blog->lieu }}
                                 <br>Adresse : {{ $blog->adresse }}
                                 <br>Heure : {{ $blog->heureDebut }}</p>
                                 <p>Contact Email : <a href="#">{{ $blog->email }}</a></p>
                            </td>
                            <td>
                                <a href="{{route('updateEvenement',['id'=>$blog->id]) }}"> <span class='glyphicon glyphicon-cog'></span> Modifier</a>  -  
                                <a href="{{route('deleteEvenement',['id'=>$blog->id]) }}"> <span class='glyphicon glyphicon-trash'></span> Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
               </table> 
            </div>
        </div>

@endsection


