<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uxtify
 */

?>
<div class="col-md-3">
                <h3 class="title-side-category">Categorías</h3>

                <?php
                  // Get the current queried object
                  $term    = get_queried_object();
                  $term_id = ( isset( $term->term_id ) ) ? (int) $term->term_id : 0;

                  $categories = get_categories( array(
                      'taxonomy'   => 'category', // Taxonomy to retrieve terms for. We want 'category'. Note that this parameter is default to 'category', so you can omit it
                      'orderby'    => 'name',
                      'parent'     => 0,
                      'hide_empty' => 0, // change to 1 to hide categores not having a single post
                      'exclude' => '1',
                  ) );
                ?>
                 <?php
                 
                foreach ( $categories as $category ) { 
                  $category_id = 'category_'.$category->cat_ID;
                  $category_name = $category->name;
                  $category_slug = $category->slug;
                  ?>
                <div class="card ux-card bg-dark text-white ux-card-cat" style="background: url(<?php echo get_field('category_image',$category_id );?>); background-position: center; background-repeat: no-repeat; background-size: cover; ">
                    <!-- <img src="assets/img/400x200placeholder.jpg" class="card-img ux-card-img" alt="..."> -->
                   <a class="link-card-cat" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"> <div class="card-img-overlay ux-card-overlay text-center">
                      <h5 class="card-title"><?php echo $category_name; ?></h5>
                    </div>
                    </a>
                </div>
                <?php } ?>
                
              </div><!-- end col-md-3 -->