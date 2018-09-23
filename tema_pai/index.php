<?php get_header(); ?>

<img class="img-fluid" src="<?php header_image(); ?>" height="<?php 
echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
<div class="content-area">
    <main>
        <section class="middle-area">
			<div class="container">
                <div class="row">
                                            
                    <div class=" col-md-9">

                    <!-- busca rápida -->
                        <section class="busca-rapida">
                            <button type="button" id="btn-limpar" class="btn btn-danger btn-sm d-none">Limpar</button>
                            <div class="input-group">
                                <div class="input-group-addon">Buscar</div>
                                <input type="text" id="campo-busca" class="form-control form-control-lg" placeholder="O que você procura?">
                            </div>
                        </section>
			        <!-- fim busca rápida -->


                        
                        <!-- ajax load 
                            <div class="ajax-info" id="loading">
                                <div class="progress d-none">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:100%;"></div>
                                </div>
                            </div>
                        fim ajax load -->
                        
                            <section id="lista-posts" class="middle-area "> 

                            </section>    
                        
                    </div>
                        <!--
                                <div class="menu-cat col-md-3">
                                    categorias 
                                    <?php get_template_part('parts/categorias');?>
                                    fim categorias 
                                </div>
                        -->
                                           
                    <?php get_sidebar( 'blog' ); ?>	
                </div>                           
            </div>
        </section>
    </main>
</div>
<div class="clear"></div>
<?php get_footer(); ?>