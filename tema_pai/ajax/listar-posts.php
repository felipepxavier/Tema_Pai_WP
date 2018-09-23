<?php


function listarPosts(){
    $page = $_GET['page'];
    $slug = $_GET['slug'];
    $string = $_GET['string'];

    $args = [
        'post_type' => 'post',
        'posts_per_page' => 4,
        'paged' =>  ($page)?  $page : 1,
        'category_name' => $slug,
        's' => $string
    ];

    $posts = new WP_Query($args);
    $totalPages = $posts->max_num_pages;

    //verifica se tem posts
    if ($posts->have_posts()) {
        $itens = [];
        //cria o loop
        while ($posts->have_posts()) {
            $posts->the_post();
            $likes = get_post_meta(get_the_ID(), 'likes', true );
            //armazena todos os campos do post
            $item =[
                'id' => get_the_ID(),
                'titulo' => get_the_title(),
                'resumo' => get_the_excerpt(),
                'likes' =>  $likes
            ];
            //add os posts para o array itens
            array_push($itens, $item);
        }
        $resposta = [
            'msg' => 'Posts encontrados.',
            'posts' => $itens,
            'pages' => $totalPages,
            'page' => $page
        ];
        wp_send_json_success($resposta);
    }else {
        $resposta = [
            'msg' => 'Nenhum post encontrado.'
        ];
        wp_send_json_error($resposta);
    } 
}

add_action( 'wp_ajax_listarPosts','listarPosts');
add_action( 'wp_ajax_nopriv_listarPosts','listarPosts');
