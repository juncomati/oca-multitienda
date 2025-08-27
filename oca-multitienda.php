<?php
/**
 * Plugin Name: OCA e-Pak Multitienda (Woo + Dokan)
 * Plugin URI: https://github.com/juncomati/oca-multitienda
 * Description: Integración OCA e-Pak para entorno multitienda con WooCommerce + Dokan. Etapa 0 (bootstrap): estructura base, autoloader, validaciones mínimas.
 * Version: 0.1.0
 * Author: Software Makers
 * License: GPLv2 or later
 * Text Domain: oca-multitienda
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) { exit; }

// Define constants
define('OCA_MULTI_VERSION', '0.1.0');
define('OCA_MULTI_PATH', plugin_dir_path(__FILE__));
define('OCA_MULTI_URL', plugin_dir_url(__FILE__));
define('OCA_MULTI_BASENAME', plugin_basename(__FILE__));

// Simple PSR-4-like autoloader for the plugin namespace
spl_autoload_register(function($class){
    $prefix = 'Makers\\OcaMultitienda\\';
    $base_dir = OCA_MULTI_PATH . 'includes/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Bootstrap
add_action('plugins_loaded', function(){
    load_plugin_textdomain('oca-multitienda', false, dirname(OCA_MULTI_BASENAME) . '/languages');
    // Initialize plugin
    Makers\OcaMultitienda\Plugin::init();
});

// Activation/Deactivation hooks
register_activation_hook(__FILE__, ['Makers\OcaMultitienda\Plugin', 'activate']);
register_deactivation_hook(__FILE__, ['Makers\OcaMultitienda\Plugin', 'deactivate']);
