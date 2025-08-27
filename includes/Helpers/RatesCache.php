<?php
namespace Makers\OcaMultitienda\Helpers;
if (!defined('ABSPATH')) { exit; }

class RatesCache {
    const TTL = 600; // 10 minutes
    public static function get($key){
        return get_transient('oca_rate_' . md5($key));
    }
    public static function set($key, $value){
        set_transient('oca_rate_' . md5($key), $value, self::TTL);
    }
}
