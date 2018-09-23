<article>
    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
    <div class="meta-info">
        <p>  Publicado em <?php echo get_the_date(); ?> por <?php the_author_posts_link(); ?></p>
    </div>
    <?php the_excerpt(); ?>
</article>