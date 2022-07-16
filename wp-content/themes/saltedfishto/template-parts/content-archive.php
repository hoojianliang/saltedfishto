<div class="col-12 col-sm-6 p-2">
    <div class="p-2 w-100 h-100 sfto-border d-flex flex-column">
        <div class="row">
            <div class="col-3">
                <?php if ( has_post_thumbnail() ) { ?>
                    <img class="img-fluid sfto-thumbnail" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="thumbnail-image">
                <?php } else { ?>
                    <img class="img-fluid sfto-thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/no-image.png" alt="thumbnail-image">
                <?php } ?>
            </div>
            <div class="col-9">
                <?php the_excerpt(); ?>
                <!--<a href="<?php the_permalink(); ?>">Dive in &rarr;</a>-->
            </div>
        </div>
        <div class="mt-auto sfto-description-div">
            <div class="d-flex flex-row justify-content-end align-items-end pt-1">
                <div class="px-2 flex-grow-1">
                    <h3><small><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></small></h3>
                </div>
                <div class="px-2"><small><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></small></div>
            </div>
            <div class="d-flex flex-row justify-content-end pb-1">
                <div class="px-2 flex-grow-1"><small><?php the_tags( '<span class="m-1 badge badge-pill sfto-badge">', '</span><span class="m-1 badge badge-pill sfto-badge">', '</span>' ) ?></small></div>
                <div class="px-2"><small><?php the_date(); ?></small></div>
                <div class="px-2"><small><?php comments_number(); ?></small></div>
            </div>
        </div>
    </div>
</div>