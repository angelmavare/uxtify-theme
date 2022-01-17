<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
						/* translators: %s: search query. */
						if($wp_query->post_count!=1) :
						echo '<h4 style="text-align:center">Se encontraron <strong>'.$wp_query->post_count.'</strong> resultados para:</h4>';
						else :
						echo '<h4 style="text-align:center">Se encontró <strong>'.$wp_query->post_count.'</strong> resultado para:</h4>';
						endif;
						echo '<h3 class="title-side-category"><strong>' . get_search_query() . '</strong></h3>';
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

