<?php
/**
 * uxtify functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uxtify
 */

if ( ! function_exists( 'uxtify_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function uxtify_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on uxtify, use a find and replace
		 * to change 'uxtify' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'uxtify', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'uxtify' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'uxtify_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'uxtify_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uxtify_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'uxtify_content_width', 640 );
}
add_action( 'after_setup_theme', 'uxtify_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uxtify_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'uxtify' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'uxtify' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'uxtify_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function uxtify_scripts() {
	//wp_enqueue_style( 'uxtify-style', get_stylesheet_uri() );
	/* wp_enqueue_style('poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap', array(), '', 'all');
	wp_enqueue_style('second-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap', array(), '', 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() . '/css/all.min.css', array(), '', 'all');
	wp_enqueue_style('mediumish', get_template_directory_uri() . '/css/mediumish.css', array(), '', 'all');
	wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), '', 'all');
	wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '', 'all');
	wp_enqueue_style('owlthemedefault', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '', 'all');
	wp_enqueue_style('night-owl', get_template_directory_uri() . '/css/night-owl.css', array(), '', 'all');
	wp_enqueue_style('uxtify', get_template_directory_uri() . '/css/uxtify.min.css', array(), '', 'all'); */
	wp_enqueue_style('uxtify', get_template_directory_uri() . '/css/pixonauta.min.css', array(), '', 'all');
	/* Scripts de la plantilla */
	wp_enqueue_script( 'uxtify-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'uxtify-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/* /Scripts de la plantilla */
	wp_enqueue_script( 'jquery341', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array(), '3.4.1', true );
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '', true );
	wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '4.3.1', true );
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '2.0', true );
	wp_enqueue_script( 'highlight', get_template_directory_uri() . '/js/highlight.pack.js', array(), '', true );
	wp_enqueue_script( 'uxtify-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '', true );


}
add_action( 'wp_enqueue_scripts', 'uxtify_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function add_custom_taxonomies() {


	$labels =  array(
		'name' => _x( 'Tipo', 'taxonomy general name' ),
		'singular_name' => _x( 'Tipo', 'taxonomy singular name' ),
		'search_items' => __( 'Buscar tipos de post' ),
		'all_items' => __( 'Todos los tipos' ),
		'parent_item' => __( 'Tipo superior' ),
		'parent_item_colon' => __( 'Tipo Superior:' ),
		'edit_item' => __( 'Editar Tipos' ),
		'update_item' => __( 'Actualizar Tipos' ),
		'add_new_item' => __( 'Agregar Nuevos tipos' ),
		'new_item_name' => __( 'Nuevas Tipos' ),
		'menu_name' => __( 'Tipos de Post' ),
	);

	// Agregamos nueva “Taxonomia Destacado” a los Posts
	register_taxonomy('tipo_post', 'post', array(
	// Hierarchical taxonomy (similar al box de categorías)
	
	// Estas opciones modifican los textos al agregar o editar los items
	// Modificamos el slug de esta taxonomía
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'query_var' => true,
	'rewrite' => array(
	'slug' => 'tipo-post',
	'with_front' => false,
	'hierarchical' => true
	),
	));
	}
	add_action( 'init', 'add_custom_taxonomies', 0 );


/*Post mas vistos (Most viewed posts)*/ 

	function setPostViews($postID) {
		$countKey = 'post_views_count';
		$count = get_post_meta($postID, $countKey, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $countKey);
			add_post_meta($postID, $countKey, '0');
		}else{
			$count++;
			update_post_meta($postID, $countKey, $count);
		}
	}

/*Pagination (Paginacion)*/ 

function bootstrap_pagination( $echo = true ) {
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	$pages = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type'  => 'array',
			'prev_next'   => true,
			'prev_text'    => __('« Anterior'),
			'next_text'    => __('Siguiente »'),
		)
	);

	if( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination = '<ul class="pagination">';

		foreach ( $pages as $page ) {
			$pagination .= "<li class='page-item'>$page</li>";
		}

		$pagination .= '</ul>';

		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
}


/*=============================================
=            BREADCRUMBS			            =
=============================================*/
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Inicio</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                echo "Post";
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

/*------------------------------------*\
	Login Admin
\*------------------------------------*/

function my_login_styles() { ?>
    <style type="text/css">
      #login h1 a, .login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/icon-pixonauta.png);
        height: 115px;
        width: 115px;
        background-size: cover;
        background-repeat: no-repeat;
	  }
	  /*Hasta aqui se cambia el logo, lo demas es custom login*/
	  #wp-submit{
		background: #753BBD;
		background-color: #753BBD;
		text-shadow: 0 -1px 1px #753BBD, 1px 0 1px #753BBD, 0 1px 1px #753BBD, -1px 0 1px #753BBD;
		border-color: #753BBD #753BBD #753BBD;
		box-shadow: 0 1px 0 #753BBD;
	  }
	  body{
		background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-login.png) !important;
		background-repeat: no-repeat !important;
		background-size: cover !important;
	  }
	  .login #backtoblog a, .login #nav a{
		  color: white !important;
	  }
	  #login {
		width: 320px;
		padding: 5% 0 0 !important;
		margin: auto;
		}
    </style>
  <?php }//end my_login_styles()
  add_action( 'login_enqueue_scripts', 'my_login_styles' );
  function my_login_logo_url() {
    return home_url();
  }//end my_login_logo_url()
  add_filter( 'login_headerurl', 'my_login_logo_url' );
  function my_login_logo_url_title() {
    return 'Pixonauta';
  }//end my_login_logo_url_title()
  add_filter( 'login_headertitle', 'my_login_logo_url_title' );



/*=============================================
=            NavWalker ca			            =
=============================================*/

if ( ! file_exists( get_template_directory() . '/wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'wp-bootstrap-navwalker-missing', __( 'It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
  } else {
	// file exists... require it.
	require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
  }

/*=============================================
=            SyntaxHighlighter Evolved			            =
=============================================*/

function ntz_fix_syntax_highlighter($content)
{
	return preg_replace('/&amp;([^;]+;)/', '&$1', $content);
}

add_filter('content_save_pre', 'ntz_fix_syntax_highlighter');
add_filter('syntaxhighlighter_htmlresult', 'ntz_fix_syntax_highlighter');
add_filter('syntaxhighlighter_precode', 'ntz_fix_syntax_highlighter');

/*=============================================
=            Custom Size thubnail			            =
=============================================*/
add_image_size( 'medium-recentpost', 338, 225, true );
// This enables the function that lets you set new image sizes
