<div class="row ux-post-autor post-top-meta">
    <div class="col-md-2 ">
		<a class="ux-author-photo" href="<?php echo get_home_url();?>/author/<?php echo get_the_author_meta( 'user_nicename' ); ?>"><img class="author-thumb" src="<?php print get_avatar_url(get_the_author_meta( 'user_email' )); ?>" alt="<?php echo get_the_author();?>"></a>
	</div>
	<div class="col-md-10">
		<a class="link-dark author-name" href="<?php echo get_home_url();?>/author/<?php echo get_the_author_meta( 'user_nicename' ); ?>"><?php echo get_the_author_meta( 'display_name' ); ?></a>
		<?php
		$twitter = get_the_author_meta( 'twitter', $post->post_author );
		$facebook = get_the_author_meta( 'facebook', $post->post_author );
		?>
		<?php if($twitter): ?><a href="<?php echo $twitter; ?>" rel="nofollow" target="_blank"><i class="fab fa-twitter white-text m-2"> </i></a><?php endif; ?>
		<?php if($facebook): ?> <a href="<?php echo $facebook; ?>" rel="nofollow" target="_blank"><i class="fab fa-facebook-f white-text m-2"> </i></a><?php endif; ?>
		
		<span class="author-description" style="max-width:800px"><?php echo get_the_author_meta( 'description' ); ?></span>
									
        <?php if(is_single()) : ?>
            <a class="span-link" href="#"><span class="ux-post-fecha"><?php echo get_the_modified_date(); ?></span></a><span class="dot"></span><span class="post-read"><?php echo get_the_modified_time(); ?> </span>
        <?php endif;?>
	</div>							
</div>