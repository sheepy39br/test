<?php
/**
 * Plugin Name: WC WhatsApp Order Control ULTRA v9.1
 * Description: Plugin personalizat pentru controlul comenzilor WhatsApp.
 * Version: 9.1
 * Author: User
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Verifică ABSPATH
}

// Încarcă modulele
require_once plugin_dir_path( __FILE__ ) . 'modules/admin-menu.php';
require_once plugin_dir_path( __FILE__ ) . 'modules/products-engine.php';
