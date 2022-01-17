<?php
/*
Template Name: Post List
*/

get_header('pages');
?>
<?php
  $currCat = get_category(get_query_var('cat'));
  $cat_name = $currCat->name;
  $cat_id   = get_cat_ID( $cat_name );
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div id="ux-menu-background"></div>
		
		<!-- Category post -->
        <section id="category-post" class="category-post">
          <div class="container">
            <div class="row">
              <div class="col-md-9">
				  <h3 class="title-side-category">Lista de publicaciones</h3>
                    <?php 
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args_recent = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'paged' => $paged, 
                        'posts_per_page' => 10,
                        );
                        $arr_recent = new WP_Query( $args_recent );
                                
                        if ( $arr_recent->have_posts() ) :    ?> 
                    <?php
                    while ( $arr_recent->have_posts() ) :
                        $arr_recent->the_post();
                    ?>
                        <!-- Post recientes -->
                        <?php if(!get_the_category()) : ?>
                            <article class="card ux-card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>" class="card-img" alt=""></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        Página: <a class="title-link" href="<?php the_permalink(); ?>"><h5 class="card-title ux-post-title"><?php the_title(); ?></h5></a>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php else : ?>
                            <article class="card ux-card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <a class="ux-img-background" href="<?php the_permalink(); ?>" style="background:url(<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>)"></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a class="span-link" href="<?php echo get_home_url().'/'.get_the_date('Y/m/d'); ?>"><small class="ux-post-fecha"><?php echo get_the_date(); ?></small></a><small class="ux-post-fecha"> / </small> <a class="span-link" href="#"><small class="ux-tag">
                                            <?php 
                                                    $categories_related = get_the_category();
                                                    $separator_related = ' , ';
                                                    $output_related = '';
                                                    if ( ! empty( $categories_related ) ) {
                                                        foreach( $categories_related as $category_related ) {
                                                            $output_related .= '<a class="span-link" href="' . esc_url( get_category_link( $category_related->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category_related->name ) ) . '"><small class="ux-tag">' . esc_html( $category_related->name ) . '</small></a>' . $separator_related;
                                                        }
                                                        echo trim( $output_related, $separator_related );
                                                    } ?>
                                            </small></a>
                                            <a class="title-link" href="<?php the_permalink(); ?>"><h5 class="card-title ux-post-title"><?php the_title(); ?></h5></a>
                                            <p><?php echo substr(get_the_excerpt(), 0,90)."… <a class='ux-extracto' href='". get_permalink() ."'><small><strong>Leer más</strong></small></a>"; ?></p>
                                            <p class="card-text"><img class="ux-profile-sm d-none d-sm-inline-block" src="<?php print get_avatar_url($user->ID); ?>"><small class="ux-post-editor"> Por <a class="link-profile" href="<?php echo get_home_url();?>/author/<?php echo get_the_author_meta( 'user_nicename' ); ?>"><?php echo get_the_author(); ?></a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php endif; ?>	
                            <!-- /post recientes -->
                            
                        <?php endwhile; ?>

                        <!-- pagination -->
                        <div class="text-center mb-3">
                            <nav class="ux-page-navigation" aria-label="Page navigation">
                                <div class="pagination">
                                    <?php 
                                        echo paginate_links( array(
                                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                            'total'        => $arr_recent->max_num_pages,
                                            'current'      => max( 1, get_query_var( 'paged' ) ),
                                            'format'       => '?paged=%#%',
                                            'show_all'     => false,
                                            'type'         => 'plain',
                                            'end_size'     => 2,
                                            'mid_size'     => 1,
                                            'prev_next'    => true,
                                            'prev_text'    => sprintf( '<i></i> %1$s', __( '« Anterior', 'text-domain' ) ),
                                            'next_text'    => sprintf( '%1$s <i></i>', __( 'Siguiente »', 'text-domain' ) ),
                                            'add_args'     => false,
                                            'add_fragment' => '',
                                        ) );
                                    ?>
                                </div>
                            </nav>
                        </div>
                        <!-- /pagination -->

                    <?php endif; ?>
                   
                    



					<!--?php get_template_part( 'template-parts/pagination' ); ?-->
				<!--?php get_template_part( 'template-parts/loop' ); ?-->
				
              </div>
			  <?php get_template_part( 'template-parts/category_list_partial' ); ?>
            </div>
			
          </div>
        </section>
		     <?php get_template_part( 'template-parts/newsletter_partial' ); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
