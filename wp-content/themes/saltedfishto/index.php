<?php
    get_header();
?>

<article>
    <?php
		if ( have_posts() ) {
            $post = get_queried_object();
            setup_postdata( $post );
            the_content();
            wp_reset_postdata();
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
            get_template_part( 'template-parts/post', 'none' );
        }
	?>

</article>

<?php
    get_footer();
?>