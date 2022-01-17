
<?php $args_destacados = array(
        'post_type' => 'post',
        'tax_query' => array(
                        array(
                            'taxonomy' => 'tipo_post',
                            'field' => 'slug',
                            'terms' => array( 'Destacados' )
                        ),
                    ),
        'post_status' => 'publish',
        'posts_per_page' => 2,
        );
        $arr_destacados = new WP_Query( $args_destacados );
        if ( $arr_destacados->have_posts() ) :    ?>  
            <div class="col-md-4">
				<div class="card ux-card mr-0 ml-0">
					<a href="#"><img class="card-img-top" src="assets/img/post-1.jpg" alt="Card image cap"></a>
					<div class="card-body">
						<a class="span-link" href="#"><small class="ux-post-fecha">30 Jun 2019</small></a><small class="ux-post-fecha"> / </small> <a class="span-link" href="#"><small class="ux-tag">Diseño</small></a>
						<a class="title-link" href="#"><h4 class="card-title ux-post-title">Card title</h4></a>
						<div class="ux-meta-post">
							<img class="ux-profile-sm d-none d-sm-inline-block" src="assets/img/POST4.jpg"><small class="ux-post-editor"> Por <a class="link-profile" href="">@AngelMavare</a></small>
						</div>
					</div>
				</div>
			</div>  

        <?php endif; ?>