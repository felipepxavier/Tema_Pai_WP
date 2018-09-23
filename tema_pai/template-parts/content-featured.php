<article <?php post_class(array('class'=>'featured')); ?>>
    
    <div class="thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?></a>
    </div>
    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
    <div class="meta-info">
        <p>
            por <span><?php the_author_posts_link(); ?></span> 
             Categorias:<span> <?php the_category( ' ' ); ?></span>
            <?php the_tags( 'Tags: <span>', ', ', '</span>' ); ?>
        </p>
        <p><span><?php echo get_the_date(); ?></span></p>
    </div>
    <?php the_excerpt(); ?>
</article>