<?php
/*
Template Name: Contact
*/
?>
<?php
get_header('pages');
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div id="ux-menu-background"></div>
	
		<!-- Category post -->
        <section class="category-post">
          <div class="container">
            <h1 class="text-center mb-5">Contacto</h1>
            <div class="row justify-content-center">
              <div class="col-md-6">
                <?php the_field('ux_contact_info'); ?>
              </div>
              <div class="col-md-6">
                <form>
                    <?php echo do_shortcode( get_field('ux_contact_form') ); ?>
                </form>
              </div>
              
			  
            </div>
			
          </div>
        </section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

