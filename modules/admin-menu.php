<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'admin_menu', 'woc_ultra_register_menus' );

function woc_ultra_register_menus() {
    // Adaugă meniul principal
    add_menu_page(
        'WhatsApp Orders',        // Titlu pagină
        'WhatsApp Orders',        // Titlu meniu
        'manage_options',         // Capacitate
        'woc-ultra-dashboard',    // Slug meniu
        'woc_ultra_dashboard_page', // Funcție callback
        'dashicons-whatsapp',     // Icon
        56                        // Poziție
    );

    // Adaugă submeniu Produse
    add_submenu_page(
        'woc-ultra-dashboard',    // Parent slug
        'Produse',                // Titlu pagină
        'Produse',                // Titlu meniu
        'manage_options',         // Capacitate
        'woc-ultra-products',     // Slug meniu
        'woc_ultra_products_page' // Funcție callback
    );
}

function woc_ultra_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Dashboard principal – plugin activ.</h1>
    </div>
    <?php
}

function woc_ultra_products_page() {
    ?>
    <div class="wrap">
        <h1>Configurare produse overlay</h1>
    </div>
    <?php
}
