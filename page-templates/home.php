<?php
/**
 * ============== Template Name: Home Page
 *
 * @package silverless_ecom
 */
get_header(); ?>

<div class="hero">

    <?php get_template_part('template-parts/hero');?>
</div>

<div class="vertical-spacing"></div>

<div class="row">
    <div class="category-wrapper">
        <?php
        if (have_rows('category_panel')):
            while (have_rows('category_panel')):
                the_row();
        ?>

        <div class="category-panel">
            <?php
                $image = get_sub_field('image');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if ($image) { ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php } ?>
            <div class="text">
                <h3 class="heading heading__sm">
                    <?php the_sub_field('title'); ?>
                </h3>
                <p>
                    <?php the_sub_field('text'); ?>
                </p>
                <a href="<?php the_sub_field('link'); ?>" class="button button__spanish">
                    <?php the_sub_field('button_text'); ?>
                </a>
            </div>
        </div>
        <?php endwhile;
        endif; ?>
    </div>

</div>

<div class="vertical-spacing"></div>

<div class="row">
    <div class="events-wrapper">
        <?php
        if (have_rows('events_panel')):
            while (have_rows('events_panel')):
                the_row();
                $image = get_sub_field('image');
        ?>
        <div class="events-panel">
            <img src="<?php echo esc_url($image['url']); ?>" />
            <div class="inner-wrapper">
                <div class="content">
                    <h2 class="heading heading_med">
                        <?php the_sub_field('heading'); ?>
                    </h2>
                    <p><?php the_sub_field('sub_heading'); ?></p>
                </div>
                <a href="" class="button">See Our Events</a>
            </div>

        </div>

        <?php endwhile;
        endif; ?>

    </div>
</div>

<div class="vertical-spacing"></div>

<div class="separator">
    <div class="row">
        <div class="heading heading__separator">
            Best Sellers
        </div>
    </div>
</div>

<div class="row">
    <div class="product-grid">
        <ul class="products"> 
            <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 12,
                    'tax_query' => array(
                            array(
                                'taxonomy' => 'product_visibility',
                                'field'    => 'name',
                                'terms'    => 'featured',
                            ),
                        ),
                    );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                endwhile;
            } else {
                echo __( 'No products found' );
            }
            wp_reset_postdata();
            ?>
        </ul>
    </div>
</div>

<div class="vertical-spacing"></div>

<?php get_footer(); ?>