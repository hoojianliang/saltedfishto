<?php
	get_header();
?>

<article>
	<?php if ( get_header_image() ) : ?>
        <div class="sfto-banner" style="background-image:url('<?php header_image(); ?>');"></div>
		<div class="sfto-banner-seperator"></div>
    <?php endif; ?>
    <?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); ?>
		
				<article>
					<?php the_content() ?>
				</article>
			
			<?php endwhile;
		else :
			echo '<p>There are no posts!</p>';
		endif;
	?>
</article>

<?php
	get_footer();
?>