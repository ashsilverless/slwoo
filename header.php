<?php

/**
 * Header
 *
 * @package silverless_ecom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo is_front_page() ? get_bloginfo('name') : wp_title(''); ?>
    </title>
    <script src="https://kit.fontawesome.com/4faa096376.js" crossorigin="anonymous" defer="defer"></script>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <div class="top-bar">
        <div class="row"></div>
    </div>
    <header class="global">
        <div class="row">
            <div class="logo">
                <a href="<?php echo site_url(); ?>">
                    <?php get_template_part('inc/img/logo');?>
                </a>
            </div>
            <div class="menu-wrapper">
                <menu>
                    <? wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container_class' => 'main-menu'
                )); ?>
                </menu>


            </div>

            <?php global $woocommerce; ?>
            <?php if ( WC()->cart->get_cart_contents_count() > 0 ) {?>

            <a class="cart-button" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"
                title="<?php _e('Cart View', 'woocommerce'); ?>">
                <span>Cart</span>
                <span class="live-count">
                    <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woocommerce'), $woocommerce->cart->cart_contents_count);?>
                    - <?php echo $woocommerce->cart->get_cart_total(); ?>
                </span>
            </a>
            <?php }?>

        </div>
    </header>
    <main class="theme-main">

        <!--closes in footer.php-->