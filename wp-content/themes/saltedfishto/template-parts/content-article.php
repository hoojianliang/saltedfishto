<div class="pb-5">
    <h3><?php the_title(); ?></h3>
    <div>
        <span>by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="nofollow"><?php echo get_the_author(); ?></a></span>
        <span> on <?php the_date() ?></span>
        <span> with 
            <a href="#comments">
                <?php comments_number() ?>
            </a>
        </span>
    </div>
    <div>
        <?php the_tags( '<span class="m-1 badge badge-pill sfto-badge">', '</span><span class="m-1 badge badge-pill sfto-badge">', '</span>' ) ?>
    </div>
    <div class="p-4">
        <?php the_content(); ?>
    </div>
</div>
<?php comments_template() ?>