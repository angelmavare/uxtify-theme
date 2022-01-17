<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uxtify
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-52S32ZC');</script>
  <!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#753BBD" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-52S32ZC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page" class="site">
	<header>
        <nav class="navbar navbar-expand-lg navbar-uxtify navbar-dark bg-transparent position-absolute">
          <div class="container">
          <?php 
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
              
            ?>
            <a class="navbar-brand pt-0" href="<?php echo get_home_url();?>" style="font-weight: 700;"><?php echo '<img style="width:150px;" src="' . esc_url( $custom_logo_url ) . '" alt="pixonauta-logo">'; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <?php
                  wp_nav_menu( array(
                      'menu'            => 'paginas',
                      'theme_location'  => 'primary',
                      'depth'           => 2,                     
                      'menu_class'      => 'navbar-nav mr-auto',
                      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'          => new WP_Bootstrap_Navwalker()
                  ) );
                  ?>

               
              <form class="form-inline my-2 my-lg-0 ml-auto" method="get" action="<?php bloginfo('url'); ?>"> <!-- echo home_url('/'); -->
                  <div class="input-group">
                      <input type="text" class="form-control uxtify-search" name="s" placeholder="Search" value="<?php the_search_query(); ?>" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-secondary uxtify-search-button" aria-label="Center Align" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
              </form>
            </div>
          </div>
        </nav>
      </header>

