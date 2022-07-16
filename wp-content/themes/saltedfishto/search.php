<?php
    get_header();
?>

<article>
    <h2>Search results for "<?= get_search_query() ?>"</h2>
    <?php
		if ( have_posts() ) {
        ?>
        <div class="row">
        <?php
			while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/content', 'archive' );
            }
        ?>
        </div>
        <?php 
            the_posts_pagination();
        } else {
            get_template_part( 'template-parts/content', 'none' );
        }
	?>
</article>

<?php
    get_footer();
?>