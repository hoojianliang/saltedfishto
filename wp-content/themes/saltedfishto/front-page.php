<?php
	get_header();
?>

<article class="content px-3 py-5 p-md-5">
    <?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); ?>
		
				<article>
					<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
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