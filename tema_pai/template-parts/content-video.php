<article>
    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(400, 320)); ?></a>
    <div class="meta-info">
        <p>Publicado em <?php echo get_the_date(); ?></p>
        <p>Categorias: <?php the_category(' '); ?></p>
        <p><?php the_tags('Tags: ', ', '); ?></p>
    </div>
    <?php the_content(); ?>
</article>