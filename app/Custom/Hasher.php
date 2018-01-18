<?php
namespace App\Custom;

class Hasher {
    
    public $bases                               = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    public function __construct() {
        $this->bases                            = str_split($this->bases);
    }

    public function encode( $element ) {
        if( $element == 0 )
            return $this->bases[0];

        $result                                 = '';
        $base                                   = count( $this->bases );
        while( $element > 0 ) {
            $result[]                           = $this->bases[( $element % $base )];
            $element                            = floor( $element / $base);
        }

        $result                                 = array_reverse( $result );

        return join( '', $result );
    }

    public function decode( $encoded ) {
        $result                                 = 0;
        $base                                   = count( $this->bases );

        $encoded                                = str_split($encoded);

        foreach($encoded as $char) {
            $pos                                = array_search($char, $this->bases);

            $result                             = $result * $base + $pos;
        }

        return $result;
    }
}