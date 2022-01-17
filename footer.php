<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uxtify
 */

?>
<footer class="page-footer font-small cyan darken-3">

<!-- Footer Elements -->
<div class="container">

  <!-- Grid row-->
  <div class="row">

	<!-- Grid column -->
	<div class="col-md-12 py-3 mt-5">
	  <div class="flex-center ux-social-footer">

		<!-- Facebook -->
		<a class="fb-ic" rel="noreferrer" href="https://www.facebook.com/pixonauta/" target="_blank">
		  <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
		</a>
		<!-- Twitter -->
		<a class="tw-ic" target="_blank" rel="noreferrer" href="https://twitter.com/pixonauta">
		  <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
		</a>
		<!--Instagram-->
		<a class="ins-ic" target="_blank" rel="noreferrer" href="https://www.instagram.com/pixonauta/">
		  <i class="fab fa-instagram fa-lg white-text fa-2x"> </i>
		</a>
		<!--Pinterest-->
		<!-- <a class="pin-ic" target="_blank">
		  <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
		</a> -->
	  </div>
	</div>
	<!-- Grid column -->

  </div>
  <!-- Grid row-->


  <div class="row justify-content-center">
	  <div class="col-md-7 p-0">
		<!-- Politicas -->
		<div class="navbar navbar-expand-lg navbar-footer bg-transparent py-3 px-0 mb-3">
			<div class="navbar-footer-child">
				<?php
				wp_nav_menu( array(
					'menu'            => 'politicas',
					'theme_location'  => 'primary',
					'depth'           => 2,                     
					'menu_class'      => 'navbar-nav mr-auto',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker()
				) );
				?>
			</div>	
				

		</div>
		<!-- Politicas -->
	  </div>
	  <div class="col-md-5 p-0">
		<!-- Copyright -->
		<div class="footer-copyright text-center text-md-right  py-3 mb-3 px-0">
				<div class="pt-2">
					&copy; <?php echo date('Y'); ?> Copyright:
					<a href="<?php echo get_home_url();?>"> PIXONAUTA</a>
				</div>
			
		</div>
		<!-- Copyright -->
	  </div>
	
	</div>
</div>
<!-- Footer Elements -->
</footer>
<!-- Footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
