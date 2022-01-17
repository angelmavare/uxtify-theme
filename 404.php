<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package uxtify
 */

get_header('pages');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div id="ux-menu-background"></div>
			<section class="error-404 not-found">
				<header class="page-header">
					
				</header><!-- .page-header -->

				<div class="page-content text-center pt-5">
					<h1 class="notfound-error"><?php esc_html_e( '404', 'uxtify' ); ?></h1>
					<p class="notfound-text"><?php esc_html_e( 'Lo sentimos, la página que buscas no esta disponible', 'uxtify' ); ?></p>
					<div class="container" style="padding-top: 20px;">
					<hr>
						<div class="row">
                        <h2 class=" text-center m-auto">Tal vez te interese</h2>
							<div class="card-deck pt-5" style="margin: auto;">
							<?php $args_recent = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page' => 3,
								);
								$arr_recent = new WP_Query( $args_recent );
										
								if ( $arr_recent->have_posts() ) :    ?> 
							<?php
							while ( $arr_recent->have_posts() ) :
								$arr_recent->the_post();
							?>
								<div class="col-md-4">
								<div class="card ux-card light mr-0 ml-0">
									<a href="<?php the_permalink(); ?>"><img class="card-img-top" src="<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>" alt="Card image cap"></a>
									<div class="card-body">
										<a class="span-link" href="<?php echo get_home_url().'/'.get_the_date('Y/m/d'); ?>"><small class="ux-post-fecha"><?php echo get_the_date(); ?></small></a><small class="ux-post-fecha"> / </small> 
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
										<a class="title-link" href="<?php the_permalink(); ?>"><h4 class="card-title ux-post-title"><?php the_title(); ?></h4></a>
										<p><?php echo substr(get_the_excerpt(), 0,90)."… <a class='ux-extracto' href='". get_permalink() ."'><small><strong>Leer más</strong></small></a>"; ?></p>
										<div class="ux-meta-post">
											<img class="ux-profile-sm d-none d-sm-inline-block" src="<?php print get_avatar_url(get_the_author_meta( 'user_email' )); ?>"><small class="ux-post-editor"> Por <a class="link-profile" href="<?php echo get_home_url();?>/author/<?php echo get_the_author_meta( 'user_nicename' ); ?>"><?php echo get_the_author(); ?></a></small>
										</div>
									</div>
								</div>
								</div>  
								<?php
							endwhile; ?>
							<?php endif; ?>
								
							</div><!-- card-deck --> 
							<div class="mt-5 text-center col-md-12" style="text-align:center">
							<a href="<?php echo get_home_url();?>" class="btn btn-lg btn-purple">Ir al inicio</a>
							</div>
						</div> <!-- end row -->
					</div>
					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
