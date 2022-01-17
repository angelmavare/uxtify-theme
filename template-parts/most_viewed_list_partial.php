<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uxtify
 */

?>

            <div class="col-md-9">
            
                  <h3 class="title-side-category">Más leidos</h3>
                  <?php
                    $args_viewed = array(
                        'post_type' => 'post',
                        'meta_key' => 'post_views_count',
                        'orderby'=> 'meta_value_num',
                        'posts_per_page' => 5
                    ); 
                    $arr_viewed = new WP_Query( $args_viewed );
                    
                    if ( $arr_viewed->have_posts() ) :    ?> 
                    <?php while ( $arr_viewed->have_posts() ) :
                        $arr_viewed->the_post();
                    ?>
                <!-- card-category-1 -->
                    <div class="card ux-card mb-3">
                      <div class="row no-gutters">
                        <div class="col-md-4">
                            <a class="ux-img-background" href="<?php the_permalink(); ?>" style="background:url(<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>)">
                              <img src="<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>" class="card-img ux-card-img d-md-none" alt="<?php the_title(); ?>">
                            </a>
                        </div>
                        <div class="col-md-8">
                          
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
                              <a class="title-link" href="<?php the_permalink(); ?>"><h5 class="card-title ux-post-title"><?php the_title(); ?></h5></a>
                              <p><?php echo substr(get_the_excerpt(), 0,90)."… <a class='ux-extracto' href='". get_permalink() ."'><small><strong>Leer más</strong></small></a>"; ?></p>
                            <p class="card-text"><img class="ux-profile-sm d-none d-sm-inline-block" src="<?php print get_avatar_url(get_the_author_meta( 'user_email' )); ?>" alt="<?php echo get_the_author(); ?>"><small class="ux-post-editor"> Por <a class="link-profile" href="<?php echo get_home_url();?>/author/<?php echo get_the_author_meta( 'user_nicename' ); ?>"><?php echo get_the_author(); ?></a></small></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                    endwhile; ?>
                    <?php endif; ?>
                    
              </div>
              <?php get_template_part( 'template-parts/category_list_partial' ); ?>