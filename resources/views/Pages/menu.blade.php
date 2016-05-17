
<ul class="left hide-on-med-and-down"> 
    <li><a href="{{route('accueil') }}" class="white-text">ACCUEIL</a></li>
    <li><a href="{{route('listeRevues') }}" class="white-text">LA REVUE</a></li>
    <li><a href="{{route('demandePublier') }}" class="white-text">PUBLIER UN ARTICLE</a></li>
    <li><a href="{{route('listeEvenements') }}" class="white-text">événements</a></li>
    
</ul>
            
<ul class="right hide-on-med-and-down">
    <li class="light-green darken-3"><a href="#modal1" class="modal-trigger white-text"><img src="{{ asset('media/icons/fa-power.png') }}" style="margin-right: 10px">S'ABONNER</a></li>
    <li class="light-green darken-3" style="margin-left: 5px"><a href="{{route('panier-show') }}" class="white-text"><img src="{{ asset('media/icons/fa-shopping-cart.png') }}" style="margin-right: 10px">MON PANIER</a></li>
     <li>
         <a class="dropdown-button" href="#" data-activates="dropdown1">FR<i class="material-icons right">arrow_drop_down</i></a>
          <ul id="dropdown1" class="dropdown-content">
            <li><a href="#">FR</a></li>
            <li><a href="#">EN</a></li>
        </ul>
     </li>
</ul>

<ul class="side-nav" id="mobile-demo">
    <li><a href="{{route('accueil') }}">ACCUEIL</a></li>
    <li><a href="{{route('listeRevues') }}">LA REVUE</a></li>
    <li><a href="{{route('demandePublier') }}">PUBLIER UN ARTICLE</a></li>
    <li><a href="{{route('listeEvenements') }}">événements</a></li>
    <li class="light-green darken-3"><a href="#modal1" class="modal-trigger white-text"><img src="{{ asset('media/icons/fa-power.png') }}" style="margin-right: 10px">S'ABONNER</a></li>
    <li class="light-green darken-3"><a href="{{route('panier-show') }}" class="white-text"><img src="{{ asset('media/icons/fa-shopping-cart.png') }}" style="margin-right: 10px">MON PANIER</a></li>
    <li>
         <a class="dropdown-button" href="#" data-activates="dropdown1">FR<i class="material-icons right">arrow_drop_down</i></a>
          <ul id="dropdown1" class="dropdown-content">
            <li><a href="#">FR</a></li>
            <li><a href="#">EN</a></li>
        </ul>
     </li>
</ul>
