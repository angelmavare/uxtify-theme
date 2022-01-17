<?php
/**
 * Template Name: Index
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uxtify
 */

get_header();
?>
<?php $ux_eslogan = get_field('ux_eslogan');
      $ux_section_overlay = get_field('ux_section_overlay'); ?> 
<div id="primary" class="content-area">
		<main id="main" class="site-main">
    <!-- Hero Carousel -->   
        
        <section id="hero-carousel" class="hero">
            <div class="owl-carousel owl-theme ux-carousel">
            <?php $args_hero = array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'posts_per_page' => 4,
              );
              $arr_hero = new WP_Query( $args_hero );
                      
              if ( $arr_hero->have_posts() ) :    
                while ( $arr_hero->have_posts() ) :
                  $arr_hero->the_post();
                  ?>  
                <div id="hero-item-<?php the_ID(); ?>" class="item" style="background-image: url('<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>');">
                  <div class="hero-content-overlay">
                      <div class="container p-sm-0" style="height:100%;">
                        <div class="row" style="height: 100%">
                          <div class="col-md-7 hero-col d-none d-md-block">
                            <h4 class="text-slogan text-white"><?php echo $ux_eslogan; ?></h4>
                          </div>
                          <div class="col-md-5 hero-col text-white">
                            <div class="resume-cont">
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
                              <h1 class="text-white mb-3"><?php the_title(); ?></h1>
                              
                              <p><?php echo substr(get_the_excerpt(), 0,400)."... "?></p>
                              <div>
                                <a href="<?php the_permalink(); ?>" class="btn btn-purple">LEER MÁS</a>
                              </div>
                            </div>
                          
                            
                          </div>
                        </div>
        
                      </div>
                </div>
                
                </div>
                <?php
                  endwhile; 
                  endif; 
                ?>
  
            </div>
            <a class="ux-scroll-down" href="#featured"><span></span></a>
        </section>
<!-- Featured -->  
    <?php get_template_part( 'template-parts/featured_list_partial' ); ?>
<!-- Recent post -->
 
        <section id="recent-post" class="recent-post" style="background: url(<?php echo $ux_section_overlay ?>); background-repeat: no-repeat; background-size: cover;">
          <div class="purple-overlay">
              <div class="container" style="padding-top: 80px;">
                
                <div class="row">
                
                <?php get_template_part( 'template-parts/recent_post_list_partial' ); ?>
                  
                </div> <!-- end row -->
               
              </div> <!-- end container -->
          </div> <!-- end purple overlay -->
        </section> <!-- end section -->
        
<!-- Category post -->
        <section id="category-post" class="category-post">
          <div class="container">
            
            <div class="row">
                <?php get_template_part( 'template-parts/most_viewed_list_partial' ); ?>
            </div><!-- end row -->
          </div>
        </section>
        <?php get_template_part( 'template-parts/newsletter_partial' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer('home');
