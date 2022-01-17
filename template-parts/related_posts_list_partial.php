<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uxtify
 */

?>

<?php 
$categories = get_the_category();
$categories_slug = [];
                              
if ( ! empty( $categories ) ) {
    foreach( $categories as $category ) {
         array_push($categories_slug, $category->slug);
    }
} 
/* echo json_encode($categories_slug); */
?>

<?php $args_relacionados = array(
        'post_type' => 'post',
        'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $categories_slug
                        ),
                    ),
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        );
        $arr_relacionados = new WP_Query( $args_relacionados );
        if ( $arr_relacionados->have_posts() ) :    ?>  
        <?php  while ( $arr_relacionados->have_posts() ) :
                      $arr_relacionados->the_post();
        ?>
            <div class="col-md-4">
				<div class="card ux-card mr-0 ml-0">
					<a href="<?php the_permalink(); ?>"><img class="card-img-top" src="<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>" alt="Card image cap"></a>
					<div class="card-body">
						<a class="span-link" href="<?php echo get_home_url().'/'.get_the_date('Y/m/d'); ?>"><small class="ux-post-fecha"><?php echo get_the_date(); ?></small></a><small class="ux-post-fecha"> / </small> <a class="span-link" href="#"><small class="ux-tag">
                        <?php 
                              $categories_related = get_the_category();
                              $separator_related = ' , ';
                              $output_related = '';
                              if ( ! empty( $categories_related ) ) {
                                  foreach( $categories_related as $category_related ) {
                                      $output_related .= '<a class="span-link" href="' . esc_url( get_category_link( $category_related->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category_related->name ) ) . '"><small class="ux-tag">' . esc_html( $category_related->name ) . '</small></a>' . $separator_related;
                                  }
                                  echo trim( $output_related, $separator_related );
                              } ?>
                        </small></a>
						<a class="title-link" href="<?php the_permalink(); ?>"><h4 class="card-title ux-post-title"><?php the_title(); ?></h4></a>
						<div class="ux-meta-post">
							<img class="ux-profile-sm d-none d-sm-inline-block" src="<?php print get_avatar_url(get_the_author_meta( 'user_email' )); ?>" alt="<?php echo get_the_author(); ?>"><small class="ux-post-editor"> Por <a class="link-profile" href="<?php echo get_home_url();?>/author/<?php echo get_the_author_meta( 'user_nicename' ); ?>"><?php echo get_the_author(); ?></a></small>
						</div>
					</div>
				</div>
			</div>  
            <?php
        endwhile; ?>
        <?php endif; 
        wp_reset_query();?>
