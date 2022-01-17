<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uxtify
 */

?>

<?php $args_destacados = array(
        'post_type' => 'post',
        'tax_query' => array(
                        array(
                            'taxonomy' => 'tipo_post',
                            'field' => 'slug',
                            'terms' => array( 'Destacados' )
                        ),
                    ),
        'post_status' => 'publish',
        'posts_per_page' => 2,
        );
        $arr_destacados = new WP_Query( $args_destacados );
        if ( $arr_destacados->have_posts() ) :    ?>  
        <section id="featured" class="featured" >
          
          
          <div class="container">
            <h2 class="text-center pt-5 d-block d-md-none">Destacados</h2>
            <!-- featured 1 -->
            <div class="row">
              <div class="card-deck">
              <div class="col-md-1">
                  <div class="vl-content">
                      <span class="v-title">Destacados</span>
                      <div class="vl"></div>
                  </div>
              </div>
              <?php
                  while ( $arr_destacados->have_posts() ) :
                      $arr_destacados->the_post();
                      ?>
                      <article id="post-<?php the_ID(); ?>"  class="col-md-5 ux-featured">
                        <div class="card ux-card" style="width: 100%;">
                          <?php
                            if ( has_post_thumbnail() ) : ?>
                              <a href="<?php the_permalink(); ?>"> <img class="card-img-top" src="<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>" alt="<?php the_title(); ?>"></a>
                            <?php
                            endif;
                          ?>
                          <div class="card-body ux-card-body">
                              <a class="span-link" href="<?php echo get_home_url().'/'.get_the_date('Y/m/d'); ?>"><small class="ux-post-fecha"><?php echo get_the_date(); ?></small></a><small class="ux-post-fecha"> / </small>
                              <?php 
                              $categories = get_the_category();
                              $separator = ' , ';
                              $output = '';
                              if ( ! empty( $categories ) ) {
                                  foreach( $categories as $category ) {
                                      $output .= '<a class="span-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"><small class="ux-tag">' . esc_html( $category->name ) . '</small></a>' . $separator;
                                  }
                                  echo trim( $output, $separator );
                              } ?>
                            <h4 class="card-title ux-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p><?php echo substr(get_the_excerpt(), 0,90)."… "; ?></p>
                            <div class="ux-meta-post">
                              <img class="ux-profile-sm d-none d-sm-inline-block" src="<?php print get_avatar_url(get_the_author_meta( 'user_email' )); ?>" alt="<?php echo get_the_author(); ?>"><small class="ux-post-editor"> Por <a class="link-profile" href="<?php echo get_home_url();?>/author/<?php echo get_the_author_meta( 'user_nicename' ); ?>"><?php echo get_the_author(); ?></a></small>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-purple">Ver Post</a>
                          </div>
                        </div> 
                      </article>
                      <?php
                  endwhile; ?>
              
              </div>
            </div>
          </div>
        </section>
    <?php endif; ?>
    