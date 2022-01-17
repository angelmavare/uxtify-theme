<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
				  
					<?php
						the_archive_title( '<h3 class="title-side-category">', '</h3>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>

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
