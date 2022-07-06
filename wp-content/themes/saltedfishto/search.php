<?php
    get_header();
?>

<article>
    <?php
		if ( have_posts() ) {
			while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/content', 'archive' );
            } 
        } else {
    ?>
        <div class="no-result-page">
            <p>Blup Blup Blup...</p>
            <p>We couldn't find any matches for "<?= get_search_query() ?>"</p>
            <p>Please try with other keyword <i class="fas fa-question fa-bounce"></i></p>
        </div>
    <?php
        }
	?>
</article>

<?php
    get_footer();
?>