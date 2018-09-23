
jQuery(function($){
    /************************* 
     * Listar Posts
     * 
     * (x)funcao php
     * (x)admin-ajax.php
     * ()funcao js
    **************************/
   var page = 1;
   var slug = $('.list-group-item.active').data('slug');
   var string = '';

   var requilp = null;

   var listarPostsAjax = function(page, slug, string){
    
    requilp = $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
            data:{
                action: 'listarPosts',
                page: page,
                slug: slug,
                string: string
            },
            beforeSend:function(){
                $('.progress').removeClass('d-none');
                if(requilp != null){
                 requilp.abort();
                 requilp = null;
                }
             }
         })
         .done(function(resposta){
             $('.progress').addClass('d-none');
 
             $('#lista-posts').html('');
             let success = resposta.success;
             let pages = resposta.data.pages;
             let posts = resposta.data.posts
   
   
               if(success){
                   //listar posts
                   
                   $.each(posts, function(i, post){
                       $('#lista-posts').append(
                           `
                               <div class="item" data-id="${post.id}">
                                   <div class="card">
                                       <div class="card-body">
                                           <h4>${post.titulo}</h4> 
                                           ${post.resumo}
                                       </div>
                                       <div class="card-footer text-right">
                                           <button type="button" class="btn btn-sm btn-primary btn-detalhes">Leia mais</button>
                                           
                                       </div>
                                   </div>
                               </div> 
   
                           `
                       )
                   });
   
                   //paginação
                   if(pages >0){
                       $('#lista-posts').append(
                           `
                               <section class="paginacao">
                                   <nav aria-label="Page navigation example">
                                       <ul class="pagination">
                                             
                                       </ul>
                                   </nav>
                               </section>      
                           `
                       );
                       for (var i = 1; i <= pages; i++) {
                           $('.pagination').append(
                               `
                                   <li class="page-item ${page == i ? 'active' : ''}"><span class="page-link">${i}</a></li>
                               `
                           );
                           
                       }
   
                   }
   
               }else{
                   $('#lista-posts').html( //template string
                   `
                   <div class="alert alert-danger text-center">
                   ${resposta.data.msg}
                   </div>
                   `
                   );
               }
               
               visitanteLikes();
           })
   
           .fail(function(){
               console.log('Ops.. algo deu errado na requisição');
           })
   }

   listarPostsAjax(page);





   //Ação do botão da categoria

   $('.list-group-item').on('click', function(){
       slug = $(this).data('slug');
        listarPostsAjax(1, slug, string);
        $('.list-group-item').removeClass('active');
        $(this).addClass('active');
   });

        //Ação do botão da paginação

    $('body').on('click', '.page-item', function(){
        page = $(this).find('span').text();
        listarPostsAjax(page, slug, string);
        $('.page-item').removeClass('active');
        $(this).addClass('active');
    });


    //Ação do botão limpar busca

    $('#btn-limpar').on('click', function(){
        listarPostsAjax(1);
        $(this).addClass('d-none');
        $('#campo-busca').val('');
        string = '';
    });

   //Ação ao digitar uma palavra na busca
    $('#campo-busca').on('keyup', function(){
        string = $(this).val();

        if(string.length >=3){
            listarPostsAjax(1, slug, string);
        }else{
            listarPostsAjax(1, slug);
        }

        if(string.length <1){
            $('#btn-limpar').addClass('d-none');
        }else{
            $('#btn-limpar').removeClass('d-none');
        }
    });


})


