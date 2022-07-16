<?php
    get_header();
?>

<article>
    <h2>Archive results for 
    <?php if (is_category()) { ?>
    "<?php single_cat_title(); ?>"

    <?php } elseif (is_author()) {
        $curauth = ( get_query_var( 'author_name' ) ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
    ?>
    "<?php echo $curauth->nickname; ?>"

    <?php } elseif (is_day()) { ?>
    "<?php echo get_the_time('F j, Y'); ?>"

    <?php } elseif (is_month()) { ?>
    "<?php echo get_the_time('F Y'); ?>"

    <?php } elseif (is_year()) { ?>
    "<?php echo get_the_time('Y'); ?>"

    <?php } elseif (is_tag()) { ?>
    "<?php echo single_tag_title(''); ?>"
    <?php } ?>
    </h2>
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
            get_template_part( 'template-parts/post', 'none' );
        }
	?>
</article>

<?php
    get_footer();
?>