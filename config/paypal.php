<?php

return array(
    // set your paypal credential
    'client_id' => 'ARpc1K_x5-B9IXFoEpbTAVdQqKC_6h2NO-525BovTlHCZ8du6mR64AJ4emN2LTQNGdvOf4ClqRocoLiG',
    'secret' => 'EGnGLKSjxTt3PX9v2bL3WD8YVcqUhwhKxZwpKdQ4xdphd12IUun3MubMh_iDhmBIQx5G19fOruQGPJ8T',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);

