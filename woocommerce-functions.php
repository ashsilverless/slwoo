<?php 
add_filter('add_to_cart_custom_fragments', 'woocommerce_header_add_to_cart_custom_fragment');
function woocommerce_header_add_to_cart_custom_fragment( $cart_fragments ) {
                global $woocommerce;
                ob_start();
                ?>
                <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View   cart', 'woocommerce'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woocommerce'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
                <?php
                $cart_fragments['a.cart-contents'] = ob_get_clean();
                return $cart_fragments;
}

add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img src="' . $image . '" alt="' . $cat->name . '" />';
		}
	}
}

function generatepress_add_featured_image() {
    if (is_shop()) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(wc_get_page_id( 'shop' ) ),'full'); 
        echo '<img src="'.$img[0].'" alt="'.basename($img[0]).'" width="'.$img[1].'" height="'.$img[2].'">';
    }
}
add_action( 'woocommerce_archive_description', 'generatepress_add_featured_image' );