
 <div id="modal6" class="modal modal-fixed-footer">
    <div class="modal-content">
            <div class="row">
                   

                <div class="col s12">
                     @if(\Session::has('message'))
                      
		<!--@include('message')-->
                <h4 class="josefin-bold">{{ session('message') }}</h4>
                
	@endif
                   
                </div>
    </div>   
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