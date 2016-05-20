 <div id="modal4" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="row">
                <div class="col s12">
                    <h4 class="josefin-bold">VOTRE COMMANDE</h4>
                </div>
                <div class="col s6">
                    <h5>Paiement PayPal</h5>
                    <p>Adresse Paypal : lambillionea@yahoo.fr
                    <br></p>
                    
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="accounts@freelanceswitch.com">
                        <input type="hidden" name="item_name" value="Donation">
                        <input type="hidden" name="item_number" value="1">
                        <input type="hidden" name="amount" value="9.00">
                        <input type="hidden" name="no_shipping" value="0">
                        <input type="hidden" name="no_note" value="1">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="lc" value="AU">
                        <input type="hidden" name="bn" value="PP-BuyNowBF">
                        <input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
                        <img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
                <div class="col s6">
                    <h5>Paiement par virement</h5>
                    <p>Union des Entomologistes Belges / Lambillionea :
                    <br>57 rue Genot, B-4032, Chênée, Belgique
                    <br>Pour la Belgique :
                    <br>BE38 7925 8328 2472</p>
                    
                    <div>
                        <p>Pour l'étranger
                        <br>Utiliser codes SWIFT-BIC, IBAN 
                        <br>et/ou frais à charge du payeur
                        <br>N° IBAN : BE38-7925-8328-2472</p>
                    </div>
                    
                    <div>
                        <p>Foreign bank transfer 
                        <br>Use the SWIFT-BIC, IBAN codes 
                        <br>and/or charge for the buyer
                        <br>SWIFT/BIC : GKCCBEBB</p>
                    </div>
                </div>
                
          </div>
            
        </div>
        <div class="modal-footer left">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Payez {{ number_format($prix,2) }} €</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">retour</a>
        </div>
    </div>
                     
