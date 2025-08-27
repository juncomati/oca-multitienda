<?php
namespace Makers\OcaMultitienda\API;
if (!defined('ABSPATH')) { exit; }

class SoapClientFactory {
    public static function make($wsdl, $options = []){
        $default = [
            'exceptions' => true,
            'trace' => false,
            'connection_timeout' => 10,
        ];
        $opts = wp_parse_args($options, $default);
        return new \SoapClient($wsdl, $opts);
    }
}
