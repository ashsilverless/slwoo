<?php
/**
 * The template for displaying 404 pages
 * This is the change
 * @package silverless_ecom
 * another commmit
 */

get_header();
?>

<?php if (strpos($_SERVER["REQUEST_URI"], "/your-safari/") !== false) {
    get_template_part('template-parts/check-password');
} else { ?>

<?php $pageImage = get_field('log_in_background', 'options'); ?>

<div class="error-404" style="background-image: url(<?php echo $pageImage; ?>);">
    <div class="row">
        <div class="content">
            <h1 class="heading heading__med heading__light">Looks like we've taken a wrong turn</h1>
            <p>Let's go home and try again.</p>
            <a href="<?php echo home_url(); ?>" class="button button__inline">Home</a>
        </div>
    </div>

</div>
<?php } ?>
<script>
document.getElementById("goto-itin").onclick = function() {
    findItinerary()
};

function findItinerary() {
    var url = '/your-safari/' + document.getElementById('unique_id').value;
    window.location.href = url;
}
</script>

<?php
get_footer();