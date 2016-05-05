
<!--CONTENU DE LA BOITE MODALE CHARGE EN AJAX-->                   
    <span class="card-title col s9 offset-s3 grey-text text-darken-4">SOMMAIRE : N° {{ $revue->fascicule}}, ANNEE {{ $revue->annee}}<i class="modal-action modal-close material-icons right">close</i></span>
    <div class="border-right col s3 center">
                    <div class="col s12">
                        <img src="media/revue-01.jpg" alt="couverture" >
                    </div>
                    <div class="col s12">
                                <h5 class="grey-text text-darken-4">LAMBILLIONEA</h5>
                                <p>Année : {{ $revue->annee}}</p>
                                <span class="card-price grey-text text-lighten-1">50€</span>
                                <div>
                                    <a href="#">AJOUTER AU PANIER</a>
                                </div>
                                
                                <div class='test'> </div>
                    </div> 
    </div>
                        
    <div class="col s9">
        <ul id='listeArticles'>
            @foreach($articles as $article)

            <li class='article'>{{ $article->auteur }},  <?php echo str_replace( $search, '<span class="surbrillance">'.$article->titre.'</span>', $article->titre); ?> : {{ $article->numeroPage}}</li>
            
               

            @endforeach

        </ul>
    </div>   
                     
                    
                        <script>
                         $(document).ready(function(){
                            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                            $('.modal-trigger').leanModal();

                            $('.modal-close').click(function(){
                                $('.modal').closeModal();
                                $('.lean-overlay').css({display:'none'});
                            });
                                
                        });

                        </script>