<?php get_header(); ?>
    <div class="primary">
    <div class="main">
            <div class="container">
            <h2>Resultado de Pesquisa para: <?php echo get_search_query(); ?> </h2>
                <?php

                    get_search_form();

                    while(have_posts()): the_post();
                        get_template_part('template-parts/content', 'search');

                        if(comments_open() || get_comments_number()):
                            comments_template();
                        endif;
                    endwhile;

                    the_posts_pagination(
                        array(
                            'prev_text' => 'Previous',
                            'next_text' => 'Next',
                            'screen_reader_text' => ' ',
                        )
                    );

                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>