<?php function paginate_posts()
{ ?>

<div class="pagination">
    <div class="row">
        <?php echo "<div class='pagination__inner'>" . paginate_links(
        array(
            'prev_text' => 'Prev',
            'next_text' => 'Next'
        )
    ) . "</div>"; ?>
    </div>
</div>
<?php } ?>