<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package uxtify
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
				  <h3 class="title-side-category">Categoría: <strong><?php single_cat_title(); ?></strong></h3>
				  	<?php get_template_part( 'template-parts/loop' ); ?>
					<?php get_template_part( 'template-parts/pagination' ); ?>
				<!--?php get_template_part( 'template-parts/loop' ); ?-->
				
              </div>
              <div class="col-md-3">

                <?php
                  // Get the current queried object
                  $term    = get_queried_object();
                  $term_id = ( isset( $term->term_id ) ) ? (int) $term->term_id : 0;

                  $categories = get_categories( array(
                      'taxonomy'   => 'category', // Taxonomy to retrieve terms for. We want 'category'. Note that this parameter is default to 'category', so you can omit it
                      'child_of'     => 0,
									    'parent'       => $term->term_id,
                      'orderby'    => 'name',
                      'show_count'   => 0,
                      'pad_counts'   => 0,
                      'hierarchical' => 1,
                      'hide_empty' => 0, // change to 1 to hide categores not having a single post
                      'exclude' => '1',
                  ) );
                ?>
                 <?php
                 if($categories){
                   echo '<h3 class="title-side-category">Subcategorías</h3>';
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
                <?php }
                  } ?>
                
              </div><!-- end col-md-3 -->
            </div>
			
          </div>
        </section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
