<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LAMBILLIONEA @yield('titre')</title>

            <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

         <link rel="stylesheet" href="{{ URL::asset('css/materialize.css') }}" type="text/css" media="screen,projection">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css" media="screen,projection">
    </head>
    <body>  
      
        <!-- JS -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>

        <script>
            
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
             $('.modal-trigger').leanModal();
            $('.modal-close').click(function(){
                $('.modal').closeModal();
                $('.lean-overlay').css({display:'none'});
            });

           // $('#header').load('modals.html');
                       
            $(".dropdown-button").dropdown({
                inDuration: 300,
                outDuration: 225,
                constrain_width: false, // Does not change width of dropdown to that of the activator
                hover: true, // Activate on hover
                gutter: 0, // Spacing from edge
                belowOrigin: false, // Displays dropdown below the button
                alignment: 'left' // Displays dropdown with edge aligned to the left of button
                });
       //$('#modal1').openModal();
        });
        
         
        </script>
        
        <!--Include de la boite modale pour le formulaire d'abonnement à la revue et le formulaire pour devenir auteur (Doit être disponible partout sur le site)-->
         @include('Revues.formulaireAbonnement')
         
         @include('Articles.FormulairePropose')
  

         <!--S'il existe un message de session appelé message alors on va inclure la vue message-->
         @if(\Session::has('message'))
            @include('message')
         @endif 

         
    <div class="bg-grass">
        <header class="navbar-fixed z-depth-2">       
            <!-- NAVIGATION -->
            <nav class="light-green darken-4" role="navigation">
                <div class="nav-wrapper container">
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    
                    @include('Pages.menu')
                    
                </div>
            </nav>
      
        </header>
        <div id="header"></div> 
        

        
        <!--Contenu principal-->
               
                  @yield('contenu')
                 
        <!--Fin du contenu principal-->
        
        
<footer class="page-footer grey darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="josefin-bold white-text">Lambillionea asbl</h5>

                <p class="grey-text text-lighten-4">Fondée en 2010 par Thierry BOUYER, Jacques HECQ et Auguste FRANCOTTE.
                <br>(anciennement "Société entomologique namuroise" créée à Namur en 1896)
                <br>Siège : 57, rue GENOT, B - 4032 Chênée, Belgique .
                <br><br>E-mail : <a href="#">lambillionea@hotmail.com</a></p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright grey darken-4">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Olivier Laval</a>
      </div>
    </div>
  </footer>
</div>
        
    <!--  Scripts-->
    

    <script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/init.js') }}"></script>

    
        @stack('javascript')
       
    </body>
</html>
