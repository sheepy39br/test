<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Înregistrare acțiuni AJAX
add_action( 'wp_ajax_woc_get_products', 'woc_get_products' );
add_action( 'wp_ajax_nopriv_woc_get_products', 'woc_get_products' );

function woc_get_products() {
    // Verifică dacă WooCommerce este activ
    if ( ! function_exists( 'wc_get_product' ) ) {
        echo '<p>Eroare: WooCommerce nu este activ.</p>';
        wp_die();
    }

    // Preia ID-urile trimise (array sau string comma-separated)
    $product_ids = isset( $_POST['ids'] ) ? $_POST['ids'] : [];
    
    // Normalizează input-ul
    if ( ! is_array( $product_ids ) ) {
        // Dacă e string separat prin virgulă, convertește în array
        if ( is_string( $product_ids ) && strpos( $product_ids, ',' ) !== false ) {
            $product_ids = explode( ',', $product_ids );
        } elseif ( is_numeric( $product_ids ) ) {
             $product_ids = array( $product_ids );
        }
    }

    if ( empty( $product_ids ) ) {
        echo '<p>Niciun produs selectat.</p>';
        wp_die();
    }

    // Iterează și generează HTML
    foreach ( $product_ids as $id ) {
        $product = wc_get_product( intval( $id ) );

        if ( ! $product ) {
            continue;
        }

        ?>
        <div class="woc-product-card" data-id="<?php echo esc_attr( $id ); ?>">
            <div class="woc-product-info">
                <h3 class="woc-product-title"><?php echo wp_kses_post( $product->get_name() ); ?></h3>
                
                <div class="woc-product-price">
                    <?php echo $product->get_price_html(); ?>
                </div>

                <?php if ( $product->is_on_sale() ) : ?>
                    <span class="woc-badge-sale">OFERTĂ</span>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    // Încheie execuția AJAX
    wp_die();
}
