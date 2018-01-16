<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package master-computerov
 */

get_header(); ?>

    <div class="top_block_content">
        <div class="container top_header">
            <div class="row">
                <div class="wrap_h1">
                    <h1>
                        <?php echo wp_get_document_title(); ?>
                    </h1>
                    <p>Чистка ноутбука от пыли и замена термопасты. Цена - от 1000 руб. Выезд на дом в Москве и области, гарантия.</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="breadcrm">
        <div class="wrap_braedcrum">
            <ul class="breadcrum">
                <li><a href="http://master-computerov.ru">Главная</a></li>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <li><a href="laptop_repair">Ремонт ноутбуков</a></li>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <li><a href="">Чистка ноутбука от пыли</a></li>
            </ul>
        </div>
    </nav>
    <section class="content_section">
        <div class="aticle_large">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php 
            $this_page_uri=get_page_link();
            $pars_page=parse_url($this_page_uri);
            $the_path=$pars_page['path'];
            $somevar=explode('/',$the_path, 3);
            $somevar1=$somevar[2];
            $the_slug=substr($somevar1,0,-1);
            $the_slug .= "category";
            $args = array(
                'category_name'     => $the_slug,
                'orderby'     => 'ID'  
            );
            $posts = get_posts( $args );
                $post_id_is=NULL;
                $post_id_is1=NULL;
                $post_id_is2=NULL;
                $post_id_is3=NULL;
                $post_id_is4=NULL;
            foreach($posts as $post){ 
                
                if( empty($post_id_is)){
                    $post_id_is=$post->ID;
                }
                elseif(empty($post_id_is1)){
                    $post_id_is1=$post->ID;
                }
                elseif(empty($post_id_is2)){
                    $post_id_is2=$post->ID;
                }
                elseif(empty($post_id_is3)){
                    $post_id_is3=$post->ID;
                }
                elseif(empty($post_id_is4)){
                    $post_id_is4=$post->ID;
                }
               
            };
                $real_post=get_post($post_id_is4);
                $real_post1=get_post($post_id_is3);
                $real_post2=get_post($post_id_is2);
                $real_post3=get_post($post_id_is1);
                $real_post4=get_post($post_id_is);
                ?>
                    
                <h2>
                    <?php echo $real_post->post_title;?>
                </h2>
                <?php echo $real_post->post_content; ?>


            </div>
            <div class="col-md-12 large_wrap col-sm-12 col-xs-12">
                <a class="popup_img" href="<?php echo get_the_post_thumbnail_url($post_id_is4); ?>"><img src="<?php echo get_the_post_thumbnail_url($post_id_is4); ?>" alt="<?php echo $real_post->post_title;?>" class="large_img" title="Пылевая пробка радиатора системы охлажнения"></a>
            </div>
           
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3><?php echo $real_post1->post_title;?></h3>
                <?php echo $real_post1->post_content; ?>
            </div>
        </div>
        <?php get_sidebar();?>
    </section>
    <section class="last_content">
        <div class="aticle_large">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h4><?php echo $real_post2->post_title;?></h4>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
                <?php echo $real_post2->post_content; ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12"><img src="<?php echo get_the_post_thumbnail_url($post_id_is2); ?>" alt=" <?php echo $real_post2->post_title;?>"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h4> <?php echo $real_post3->post_title;?></h4>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12"><img src="<?php echo get_the_post_thumbnail_url($post_id_is1); ?>" alt=" <?php echo $real_post3->post_title;?>" title="Наносим термопасту на процессор"></div>
            <div class="col-md-9 col-sm-8 col-xs-12">
                <?php echo $real_post3->post_content; ?>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h4><?php echo $real_post4->post_title;?></h4>
                <?php 
                    echo $real_post4->post_content; 
                    wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>