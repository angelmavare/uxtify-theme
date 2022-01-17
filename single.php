<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package uxtify
 */

get_header('pages');
setPostViews(get_the_ID());
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<section id="ux-banner-post">
		
			<div class="ux-banner-filter" style=" background: url(<?php the_field('imagen_de_cabecera');?>); background-position: center center; background-repeat: no-repeat; background-size: cover;"></div>
			<div class="ux-overlay"></div>
			<div class="x-container">
				<div class="container">
					<div class="ux-date-cat text-center">
						<h6 class="text-white mb-0"> <?php echo get_the_modified_date(); ?> <span class="ux-separator-date">/</span> <?php 
                              $categories = get_the_category();
                              $separator = ' , ';
                              $output = '';
                              if ( ! empty( $categories ) ) {
                                  foreach( $categories as $category ) {
                                      $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                  }
                                  echo trim( $output, $separator );
                              } ?></h6>
						
					</div>
					<div class="breadcrumb-cont">
						<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
					</div>
					
				</div>
			</div>
	  
		</section>

		<?php
		while ( have_posts() ) :
			the_post();
		?>
			<section id="ux-post-article">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-xs-12"></div>
						<div class="col-md-6 col-xs-12">
							<div class="mainheading">
								<?php the_title( '<h1 class="posttitle text-center">', '</h1>' ); ?>
								<h6 class="text-center">Por <?php echo get_the_author(); ?></h6>
							</div>
						</div>
						<div class="col-md-3 col-xs-12"></div>
					</div>
					<div class="row">

						<!-- Begin Fixed Left Share -->
						<div class="col-md-3 col-xs-12">
							<!-- <div class="share">
							</div> -->
						</div>
						<!-- End Fixed Left Share -->

						<!-- Begin Post -->
						<div class="col-md-6 col-md-offset-2 col-xs-12">
							<div class="ad">
							
							</div>
							<!-- Begin Featured Image -->
							<img class="featured-image img-fluid" src="<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>" alt="<?php the_title(); ?>">
							<!-- End Featured Image -->

							<!-- Begin Post Content -->
							<div class="article-post">
								<?php the_content(); ?>
							</div>
							<!-- End Post Content -->

							<!-- Begin Tags -->
							<?php 
							$tags = wp_get_post_tags($post->ID);
							$html = '<div class="after-post-tags"><ul class="tags">';
							foreach ( $tags as $tag ) {
								$tag_link = get_tag_link( $tag->term_id );
										 
								$html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
								$html .= "{$tag->name}</a></li>";
							}
							$html .= '</ul></div>';
							echo $html;
							?>
							<!-- End Tags -->
							

						</div>
						<!-- End Post -->
						<div class="col-md-3 col-xs-12 pb-5">
							<div class="sidebar">
							<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- Anuncios Sidebar -->
							<ins class="adsbygoogle"
								style="display:block"
								data-ad-client="ca-pub-8275348615930938"
								data-ad-slot="2126506017"
								data-ad-format="auto"
								data-full-width-responsive="true"></ins>
							<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
							</script>

							</div>
						</div>
					</div>
				</div>
			</section>
			<?php endwhile; // End of the loop.?>
			<!-- End Article
			================================================== -->

			<div class="hideshare"></div>

			<!-- Begin Related
			================================================== -->
			<div class="graybg2">
				<div class="container">
					<!-- Begin Top Meta -->
					<?php get_template_part( 'template-parts/author_card_partial' ); ?>
					<!-- End Top Menta -->
					<div class="row listrecent listrelated">
						
							<div class="row">
							
								<div class="card-deck" style="margin: auto;">
								<?php get_template_part( 'template-parts/related_posts_list_partial' );?>
												
								</div><!-- card-deck --> 
							</div> <!-- end row -->


					</div>
					
				</div>
			</div>
			<!-- End Related Posts
			================================================== -->
			
			<div class="graybg2 bg-white">
				<div class="container">
					<?php 
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;	
						
						
					?>
				</div>
			</div>
			<?php get_template_part( 'template-parts/newsletter_partial' ); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();