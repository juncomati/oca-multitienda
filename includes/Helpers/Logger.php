<?php
namespace Makers\OcaMultitienda\Helpers;
if (!defined('ABSPATH')) { exit; }

class Logger {
    public static function log($message, $context = []){
        $upload_dir = wp_upload_dir();
        $dir = trailingslashit($upload_dir['basedir']) . 'oca-logs/';
        if (!file_exists($dir)) {
            wp_mkdir_p($dir);
        }
        $file = $dir . 'oca.log';
        $line = '[' . date('Y-m-d H:i:s') . '] ' . (is_string($message) ? $message : wp_json_encode($message)) .
            (!empty($context) ? ' ' . wp_json_encode($context) : '') . PHP_EOL;
        error_log($line, 3, $file);
    }
}
