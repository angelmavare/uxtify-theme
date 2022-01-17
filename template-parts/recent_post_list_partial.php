<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uxtify
 */

?>
            <h2 class="text-white text-center pb-4 m-auto">Post Recientes</h2>
                <div class="card-deck" style="margin: auto;">
                  <?php $args_recent = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    );
                    $arr_recent = new WP_Query( $args_recent );
                            
                    if ( $arr_recent->have_posts() ) :    ?> 
                  <?php
                  while ( $arr_recent->have_posts() ) :
                      $arr_recent->the_post();
                  ?>
                    <div class="col-md-4">
                      <div class="card ux-card light mr-0 ml-0">
                          <a href="<?php the_permalink(); ?>"><img class="card-img-top" src="<?php echo $url_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-recentpost')[0];?>" alt="<?php the_title(); ?>"></a>
                          <div class="card-body">
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
                              <a class="title-link" href="<?php the_permalink(); ?>"><h4 class="card-title ux-post-title"><?php the_title(); ?></h4></a>
                              <p><?php echo substr(get_the_excerpt(), 0,90)."… <a class='ux-extracto' href='". get_permalink() ."'><small><strong>Leer más</strong></small></a>"; ?></p>
                              <div class="ux-meta-post">
                                 <img class="ux-profile-sm d-none d-sm-inline-block" src="<?php print get_avatar_url(get_the_author_meta( 'user_email' )); ?>" alt="<?php echo get_the_author(); ?>"><small class="ux-post-editor"> Por <a class="link-profile" href="<?php echo get_home_url();?>/author/<?php echo get_the_author_meta( 'user_nicename' ); ?>"><?php echo get_the_author(); ?></a></small>
                              </div>
                          </div>
                      </div>
                    </div>  
                    <?php
                  endwhile; ?>
                  <?php endif; ?>
                      
                </div><!-- card-deck --> 
                <div class="mt-5 text-center col-md-12" style="text-align:center">
                  <a href="<?php echo get_home_url();?>/publicaciones/" class="btn btn-lg btn-purple-light">VER TODOS</a>
                </div>