<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package uxtify
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div id="ux-menu-background"></div>
		<!-- Category post -->
        <section id="category-post" class="category-post">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-10">
				  <h3 class="title-side-category">Escritos por: <strong><?php echo get_the_author(); ?></strong></h3>

				  	<?php get_template_part( 'template-parts/author_card_partial' ); ?>
					<?php get_template_part( 'template-parts/loop' ); ?>
					<?php get_template_part( 'template-parts/pagination' ); ?>
              </div>
			  
            </div>
			
          </div>
        </section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
