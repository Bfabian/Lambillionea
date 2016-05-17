


    <div id="modal6" class="modal">
        <div class="modal-content">
                <div class="row">
                    <div class="col s12">

               
                    <h5 class="center josefin-regular"> {{ \Session::get('message') }}</h5>
                    <div class="modal-footer right">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">OK</a>
                    </div>

                </div>
            </div>   
        </div>  
    </div> 


 <script>
    //Lancement automatique de la boite modale dès que cette vue est chargée
    $(function() {
        $('#modal6').openModal();
    });

</script>