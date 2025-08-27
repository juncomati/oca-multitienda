<?php
namespace Makers\OcaMultitienda\Helpers;
if (!defined('ABSPATH')) { exit; }

class Units {
    public static function gramsToKg($g){ return max(0, floatval($g)) / 1000.0; }
    public static function cmToM($cm){ return max(0, floatval($cm)) / 100.0; }
    public static function volumetricWeightKg($length_cm, $width_cm, $height_cm, $factor = 250){ 
        // Typical factor; can be filtered later
        $vol_m3 = self::cmToM($length_cm) * self::cmToM($width_cm) * self::cmToM($height_cm);
        return $vol_m3 * $factor;
    }
}
