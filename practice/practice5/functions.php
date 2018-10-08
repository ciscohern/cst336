<?php
    function random_password( $length, $arraylength ) {
        for($i=0;$i<$arraylength;$i++){    
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
        }
}

    function random_numbers( $length ) {
            $chars = "1234567890";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
}


    
    
    
    
    
    
?>