<?php
namespace Makers\OcaMultitienda;

use Makers\OcaMultitienda\Helpers\Logger;

if (!defined('ABSPATH')) { exit; }

final class Plugin {
    public static function init(){
        // Check dependencies
        add_action('admin_init', [__CLASS__, 'check_dependencies']);
        // Basic menus or notices
        add_action('admin_menu', [__CLASS__, 'register_admin_page']);
    }

    public static function activate(){
        // Future: DB tables if needed
    }

    public static function deactivate(){
        // Future: cleanup schedulers
    }

    public static function check_dependencies(){
        $missing = [];
        if (!class_exists('WooCommerce')) { $missing[] = 'WooCommerce'; }
        if (!class_exists('WeDevs_Dokan')) { $missing[] = 'Dokan'; }
        if (!class_exists('ACF')) { $missing[] = 'Advanced Custom Fields Pro'; }
        if (!empty($missing) && current_user_can('activate_plugins')){
            add_action('admin_notices', function() use ($missing){
                echo '<div class="notice notice-error"><p><strong>OCA Multitienda:</strong> faltan dependencias: ' . esc_html(implode(', ', $missing)) . '.</p></div>';
            });
        }
    }

    public static function register_admin_page(){
        add_menu_page(
            __('OCA Multitienda', 'oca-multitienda'),
            __('OCA Multitienda', 'oca-multitienda'),
            'manage_woocommerce',
            'oca-multitienda',
            [__CLASS__, 'render_admin'],
            'dashicons-admin-generic',
            56
        );
    }

    public static function render_admin(){
        include OCA_MULTI_PATH . 'templates/admin-settings.php';
    }
}
