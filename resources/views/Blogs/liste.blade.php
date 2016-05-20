@extends ('../Template.layout')

@section('titre') @endsection

@section('contenu')

<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h2 class="header josefin-bold col s12">événements</h2>
                <p class="light">Les réunions se tiennent tous les 3èmes samedi du mois (de septembre à avril inclus) au Musée Royal d'Afrique Centrale à Tervuren – au Palais des colonies (qui se trouve face à vous lorsque vous êtes près de la fontaine des animaux musiciens) , l'entrée se fait par le département de Géologie (à droite quand vous êtes face au bâtiment).</p>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="media/bg-2.jpg" alt="Unsplashed background img 2"></div>
</div>

<div class="z-depth-3">
    <div class="container">
        <div class="section">
            <h2 class="josefin-bold">Evénements à venir</h2>
               <table class="striped">
                <thead>
                    <tr>
                        <th data-field="date">Date</th>
                        <th data-field="name">Evénement</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td class="josefin-bold">{{ $blog->dateEvent }}</td>
                        <td>
                            <h5 class="josefin-regular">{{ $blog->titre }}</h5>
                            <p>{{ $blog->lieu }}
                            <br>Adresse : {{ $blog->adresse }}
                            <br>Heure : {{ $blog->heureDebut }}</p>
                            <p>Contact Email : <a href="#">{{ $blog->email }}</a></p>
                        </td>
                    </tr>
                    @endforeach
  
                </tbody>
            </table> 
                
        </div>
    </div>
</div>

@endsection


