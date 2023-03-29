<?php
    $heroImage = get_field('hero_background_image');
    if (get_field("hero_background_video")) {
        $video = get_field("hero_background_video");
    }
?>

<?php
    if (is_front_page()) {
        $heroSize = 'full-height';
    } else {
        $heroSize = 'standard';
    } ?>

<div class="hero <?php echo $heroSize; ?>" style="background-image: url(<?php echo $heroImage['url']; ?>);">

    <div class="row grid-layout2 ">
        <div class="hero__heading">
            <h2 class="heading heading__sm heading__alt date">
            </h2>
            <h1 class="heading heading__xl">
                <?php the_field('hero_heading');?>
            </h1>
            <a href="<?php the_field('hero_page_link');?>"
                class="button button__ghost"><?php the_field('hero_button_text');?></a>
        </div>
        <?php if (is_front_page()) { ?>

        <?php } ?>
    </div>

</div>