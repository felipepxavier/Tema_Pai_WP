<?php
/*
Template Name: Página Contato

*/
?>

<?php get_header(); ?>

<img class="img-fluid" src="<?php header_image(); ?>" height="<?php 
echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

    <div class="content-area">
        <main>
            <section class="middle-area">
                <div class="container">
                    
                        <div class="min-hei">
                            <?php
                            //se houver algum post
                            if(have_posts()):
                                //Enquanto houver posts, mostre-os pra gente
                                while(have_posts() ): the_post();
                            ?>

                            <article>
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </article>

                            <?php
                                endwhile;
                            else:
                            ?>

                            <!--Não Existem posts para serem mostrados, no momento-->
                            <p>There's nothing yet to be displayed...</p>

                            <?php endif; ?>

                        </div>
                    
                </div>
            </section>

            <section class="map">
                <?php
                 $key = get_theme_mod( 'set_map_apikey' );
                 $address = urlencode( get_theme_mod( 'set_map_address' ) ) ;    
                ?>
                <iframe
                    width="100%"
                    height="450"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=<?php echo $key?>
                        &q=<?php echo $address?>&zoom=15" allowfullscreen>
                </iframe>
            </section>
        </main>
    </div>
    

<?php get_footer(); ?>
            
            
            
            
            
            
            
            

            
            
            
            
            
            
            
           