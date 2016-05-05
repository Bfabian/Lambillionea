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
                    <tr>
                        <td class="josefin-bold">20 mars 2016</td>
                        <td>
                            <h5 class="josefin-regular">18ème Bourse d’Insectes de Mons</h5>
                            <p>Ecole Provinciale “Jean d’Avesnes„
                            <br>Adresse : Avenue du Gouverneur Emile Cornez 1  7022 Mons, Belgique</p>
                            <p>Contact Email : <a href="#">contact@kiwanismons-borinage.be</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="josefin-bold">23 octobre 2016</td>
                        <td>
                            <h5 class="josefin-regular">INSECTORAMA 32 (Bourse entomologique de Seraing)</h5>
                            <p>Athénée “Air Pur„
                            <br>Adresse : Rue des Nations Unies 1, B-4100 Seraing, Belgique</p>
                            <p>Contact: E-mail: <a href="#">insectoramaseraing@gmail.com</a> - Facebook: <a href="#">www.facebook.com/insectoramaseraing</a></p>
                        </td>
                    </tr>
                </tbody>
            </table> 
                
        </div>
    </div>
</div>

@endsection


