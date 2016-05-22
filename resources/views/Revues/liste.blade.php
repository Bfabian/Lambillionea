@extends ('../Template.layout')

@section('titre') @endsection

@section('contenu')

<div class="z-depth-3">
    <div class="container">
        <div class="section">
            <div class="row">
                <h2 class="josefin-bold">La revue</h2>

                <section id='liste' class="col s8">
                    @foreach($revues as $revue)
                        <div class="card col s12">
                            <div class="card-image waves-effect waves-block waves-light col s4">
                                <img class="activator margin-10" src="{{ asset('media/revue-01.jpg') }}">
                            </div>
                            <div class="card-content col s8">
                                <span class="card-title activator grey-text text-darken-4">LAMBILLIONEA</span>
                                <p>Année {{ $revue->annee}},  N°{{ $revue->fascicule }}, Tome : {{ $revue->tome }}</p>
                                <span class="card-price grey-text text-lighten-1">50€</span>
                                <div class="card-action">
                                    <a href="{{route('panier-add',['revue'=>$revue->id]) }}">AJOUTER AU PANIER</a>
                                    <!--id pour la requete AJAX-->
                                    <a data-id="{{ $revue->id }}" class="modal-trigger right detailRevue" href="#revue01">EN SAVOIR +</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </section>
     
                <!--Boite modale avec le détail de la revue chargé en Ajax-->
                <div id="revue01" class="modal bottom-sheet">
                    <div id='detail' class="modal-content">
                       
              
                    </div>
                    
                    <div class="footer-bottom-sheet col s12 grey darken-4">
                        <div class="white-text">
                            Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Olivier Laval</a>
                        </div>
                    </div>
                </div>
                
        @push('javascript')
       
        <script>      

   //Transaction ajax pour charger le détail de la revue dans la fenêtre modale
   $('body').on('click','.detailRevue',function(){

        var revueID = $(this).attr('data-id'); 
        var search = $('#search').val();
       
            $.ajax({
            method: 'GET',
            url: '{{ URL::to('/')}}/detailRevueLoad',
            data: {revueID: revueID, search: search},
         //   data: {revueID: revueID},
            success: function (reponsePHP) {
                //alert(reponsePHP);
                $('#revue01 #detail').html(reponsePHP);
            },
            error: function () {
                alert('Erreur !');
            }
        });
    });

    /*------------------------------------------------------------------------
     *   Transaction ajax pour faire des tris par année
     -----------------------------------------------------------------------*/
    $('.tri').click(function(){

        var annee = $(this).attr('data-tri');
        
         $.ajax({
            method: 'GET',
            url: '{{ URL::to('/')}}/triRevue',
            data: {annee: annee},
            success: function (reponsePHP) {

                $('#liste').html(reponsePHP).hide().fadeIn(600);
            },
            error: function () {
                alert('Erreur !');
            }
        });
    });
    
    /*----------------------------------------------------------------------------
     * Transaction ajax pour effectuer une recherche par tag ou par article
     --------------------------------------------------------------------------*/
     $(function(){
        //On vide le champ recherche
        $('#search').val('');
     });
    
    $("#search").keyup(function(){
        
        //On vide la liste
        $('#listeArticles').html('');
        $('#listeTags').html('');
        
         var search = $(this).val();
         
       if (search.length >= 2){
            $.ajax({
               method: 'GET',
               url: '{{ URL::to('/')}}/rechercheListe',
               data: {search: search},
               success: function (reponsePHP) {

  
                    for(var i = 0; i<reponsePHP.articles.length; i++) {
                       code = '<li><a href="#" class="collection-item" data-id="'+reponsePHP.articles[i].id+'">' +reponsePHP.articles[i].titre+ '</a></li>';
                       $('#listeArticles').append(code).fadeOut(400,function(){
                           $(this).fadeIn(400);
                       }); 
                   }
                   
                   for(var i = 0; i<reponsePHP.tags.length; i++) {
                       code = '<li><a href="#" class="collection-item" data-id="'+reponsePHP.tags[i].id+'">' +reponsePHP.tags[i].titre+ '</a></li>';
                       $('#listeTags').append(code).fadeOut(400,function(){
                           $(this).fadeIn(400);
                       }); 
                   }

               },
             /*  error: function () {
                   alert('Erreur !');
               }*/
           });
        
        } 
               
    });
    
    /*----------------------------------------------------------------------------------------------
    * Transaction ajax pour affficher les revues en fonction de la recherche effectuée (par article)
     -----------------------------------------------------------------------------------------------*/
    $('body').on('click','#listeArticles .collection-item',function(){
    
        //On vide la liste de suggestions de la recherche
         $('#listeArticles').html('');
         $('#listeTags').html('');
        
        var articleID = $(this).attr('data-id');
        
        $.ajax({
            method: 'GET',
            url: '{{ URL::to('/')}}/recherche',
            data: {articleID: articleID},
            success: function (reponsePHP) {
     
                $('#liste').html(reponsePHP).hide().fadeIn(600);

            },
            error: function () {
                alert('Erreur !');
            }
        });
        
    });
    /*----------------------------------------------------------------------------------------
    * Transaction ajax pour affficher les revues en fonction de la recherche effectuée (par tag)
     -----------------------------------------------------------------------------------------*/
    $('body').on('click','#listeTags .collection-item',function(){
    
        //On vide la liste de suggestions de la recherche
         $('#listeArticles').html('');
         $('#listeTags').html('');
        
        var tagID = $(this).attr('data-id');
        
        $.ajax({
            method: 'GET',
            url: '{{ URL::to('/')}}/recherche',
            data: {tagID: tagID},
            success: function (reponsePHP) {
     
                $('#liste').html(reponsePHP).hide().fadeIn(600);

            },
            error: function () {
                alert('Erreur !');
            }
        });
        
    });
    
    /*
    * Vider la liste de suggestions lorsqu'on clique sur la petite croix
     */
     $('body').on('click','#close',function(){

         $('#listeArticles').html('');
         $('#listeTags').html('');
         
     });

        </script>
        @endpush

                <aside  class="col s4">                  
                    <nav>
                        <div class="nav-wrapper">
                            <form>
                                <div class="input-field white">
                                    <input id="search" type="search" placeholder="Recherche par tag ou par article" required>
                                    <label for="search"><i class="material-icons grey-text text-darken-3">search</i></label>
                                    <i id="close" class="material-icons">close</i>
                                </div>
                            </form>
                            
                        </div>
                    </nav>
                    
                    <!--RESULTATS DE LA RECHERCHE-->
                    <ul >
                      <li class="collection-header"><h5>Articles</h5>
                          <ul class='collection' id='listeArticles'>
                              
                          </ul>
                      </li>
                      
                      <li  class="collection-header"><h5>Tags</h5>
                          <ul class='collection' id='listeTags'>
                              
                          </ul>
                      </li>

                    </ul>
                    <!---->
                    
                    <div class="margin-top-30">
                        <h5 class="josefin-bold">Options de tri</h5>
                    </div>

                    <form action="#">
                         <p>
                          <input class='tri' data-tri='Toutes' name="group1" type="radio" id="test0" />
                          <label for="test0">Toutes</label>
                        </p>
                        <p>
                          <input class='tri' data-tri='2016' name="group1" type="radio" id="test1" />
                          <label for="test1">Année 2016</label>
                        </p>
                        <p>
                          <input class='tri' data-tri='2015' name="group1" type="radio" id="test2" />
                          <label for="test2">Année 2015</label>
                        </p>
                        <p>
                          <input class='tri' data-tri='2014' name="group1" type="radio" id="test3" />
                          <label for="test3">Année 2014</label>
                        </p>
                         <p>
                            <input class='tri' data-tri='2013' name="group1" type="radio" id="test4" />
                            <label for="test4">Année 2013</label>
                        </p>
                        <p>
                          <input class='tri' data-tri='2012' name="group1" type="radio" id="test5" />
                          <label for="test5">Année 2012</label>
                        </p>
                        <p>
                          <input class='tri' data-tri='2011' name="group1" type="radio" id="test6" />
                          <label for="test6">Année 2011</label>
                        </p>
                        <p>
                          <input class='tri' data-tri='2010' name="group1" type="radio" id="test7" />
                          <label for="test7">Année 2010</label>
                        </p>
                         <p>
                          <input class='tri' data-tri='2009' name="group1" type="radio" id="test8" />
                          <label for="test8">Année 2009</label>
                        </p>
                    </form>
                    
                </aside>
                <!--Pagination-->
                <div class="col s12">
                   
                  
                         {!! $revues->links() !!}
            
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


