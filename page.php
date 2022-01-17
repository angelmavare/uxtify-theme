<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uxtify
 */

get_header('pages');
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div id="ux-menu-background"></div>
		
			<!-- Category post -->
			<section style="padding: 60px 0;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-10">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>

					</div>
				</div>
			
				
			</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

	

<?php
get_sidebar();
get_footer();
