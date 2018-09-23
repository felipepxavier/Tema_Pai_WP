<?php
//Incluindo os arquivos da TGM
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';

//incluindo
include('ajax/listar-posts.php');

//Requerendo o arquivo Customizer
require get_template_directory() . '/inc/customizer.php';

//Carregando nossos scripts e folhas de estilos
function load_scripts(){
    wp_enqueue_style('template', get_template_directory_uri() .'/css/template.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'load_scripts');



function wp_config(){
    //rgisrtando nossos menus
    register_nav_menus(
        array(
            'my_main_menu' => 'Main Menu',
            'footer_menu' => 'Footer Menu'
        )
    );
    $args = array(
       'height' => 225,
       'width'  => 1920 
    );
    add_theme_support('custom-header', $args);
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('video','image'));
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array('height'=>110, 'width'=>200));
}

add_action('after_setup_theme', 'wp_config', 0);
add_action('widgets_init', 'wpcurso_sidebars');
function wpcurso_sidebars(){
    register_sidebar(
        array(
            'name' => 'Home Page Sidebar',
            'id' => 'sidebar-1',
            'description' => 'Sidebar to be used on Home Page',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'

        )
    );
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'sidebar-2',
            'description' => 'Sidebar to be used on Blog Page',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'

        )
    );

    register_sidebar(
        array(
            'name' => 'Services 1',
            'id' => 'services-1',
            'description' => 'Fist Services Area.',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'

        )
    );

    register_sidebar(
        array(
            'name' => 'Services 2',
            'id' => 'services-2',
            'description' => 'Second Services Area.',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'

        )
    );

    register_sidebar(
        array(
            'name' => 'Services 3',
            'id' => 'services-3',
            'description' => 'Third Services Area.',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'

        )
    );

    register_sidebar(
        array(
            'name' => 'Social Icons',
            'id' => 'social-media',
            'description' => 'Place your media Icons here.',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'

        )
    );
}


/*********************************************
* ASSETS
**********************************************/

function app_scripts() {

	// assets folder
    $css_folder =  get_template_directory_uri() . '/css';
	$js_folder	=  get_template_directory_uri() . '/js';

	// versão //resolve problema de cache
	$versao 	= rand(0, 999);


	// jQuery
	wp_enqueue_script('jquery');

    // bootstrap
	wp_enqueue_script( 'popper', $js_folder . '/popper.min.js', null, 1, true );
	wp_enqueue_script( 'bootstrap', $js_folder . '/bootstrap.js', null, 1, true );
	wp_enqueue_style( 'bootstrap', $css_folder . '/bootstrap.css', 1, 1, 'all' );

	// tema
	wp_enqueue_script( 'app', $js_folder . '/app.js', null, $versao , true );
	
	$wpVars = [
		'ajaxurl' => admin_url('admin-ajax.php')
	];
	//localizar o arquivo app.js //criando objeto 'wp' que recebe as variáveis definidas no '$wpVars'
	wp_localize_script( 'app', 'wp', $wpVars );
}

add_action("wp_enqueue_scripts", "app_scripts");




