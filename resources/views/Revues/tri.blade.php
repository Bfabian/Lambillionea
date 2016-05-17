


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
