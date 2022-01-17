<?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <?php if(!get_the_category()) : ?>
        <article class="card ux-card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>" class="card-img" alt="<?php the_title(); ?>"></a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    Página: <a class="title-link" href="<?php the_permalink(); ?>"><h5 class="card-title ux-post-title"><?php the_title(); ?></h5></a>
                        <p></p>
                    </div>
                </div>
            </div>
        </article>
        <?php else : ?>
        <article class="card ux-card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <a class="ux-img-background" href="<?php the_permalink(); ?>" style="background:url(<?php echo $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>)"></a>
                </div>
                <div class="col-md-8">
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
                        <a class="title-link" href="<?php the_permalink(); ?>"><h5 class="card-title ux-post-title"><?php the_title(); ?></h5></a>
                        <p><?php echo substr(get_the_excerpt(), 0,90)."… <a class='ux-extracto' href='". get_permalink() ."'><small><strong>Leer más</strong></small></a>"; ?></p>
                        <p class="card-text"><img class="ux-profile-sm d-none d-sm-inline-block" src="<?php print get_avatar_url(get_the_author_meta( 'user_email' )); ?>" alt="<?php echo get_the_author(); ?>"><small class="ux-post-editor"> Por <a class="link-profile" href="<?php echo get_home_url();?>/author/<?php echo get_the_author_meta( 'user_nicename' ); ?>"><?php echo get_the_author(); ?></a></small></p>
                    </div>
                </div>
            </div>
        </article>
        <?php endif; ?>			
	<?php endwhile; ?>

	<?php else: ?>

	<!-- article -->
		<article>
			<h2>No hay Post disponibles</h2>
		</article>
	<!-- /article -->

<?php endif; ?>