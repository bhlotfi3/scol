<!-- blog section -->
<div class="container weblizar_blog">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="center-title">
				<?php 
				$blog_titl = get_theme_mod('blog_title','Latest Blog');
				if (!empty ($blog_titl)) { ?>
					<div class="heading-title">
						<h2 class="h2-section-title weblizar_blog_title"><?php echo esc_html($blog_titl); ?></h2>
					</div>
				<?php } 
				$blog_text = get_theme_mod('blog_text','Lorem Ipsum is simply dummy text of the printing and typesetting industry..');
				if (!empty ($blog_text)) { ?>
					<p class="weblizar_blog_text"><?php echo esc_html($blog_text); ?> </p>
				<?php } ?>
				<div class="space-sep20"></div>
			</div>
		</div>
	</div>
	<div class="row masonry1">
		<?php
		$count_posts = wp_count_posts();
		$published_posts = $count_posts->publish;
		$blog_count = get_theme_mod('blog_count');
		if (!empty ($blog_count)) {
			$published_posts = $blog_count;
		}
		$args = array( 'post_type' => 'post', 'posts_per_page' =>$published_posts,'ignore_sticky_posts' => 1);		
		$post_type_data = new WP_Query( $args );
		$i=1;
		while($post_type_data->have_posts()):
			$post_type_data->the_post();
		    ?>							
			<div class="col-md-4 col-sm-4" id="row-<?php echo esc_attr($i); ?>">
				<div class="feature animated fadeIn animatedVisi" data-animtype="fadeIn" data-animrepeat="0" data-animspeed="1s" data-animdelay="0s" style="-webkit-animation: 1s 0s;">
					<div class="feature-image img-overlay">							
						<?php if(has_post_thumbnail()): ?>
						<?php $default=array('class'=>'img-responsive'); 
							the_post_thumbnail('wl_blog_img', $default); ?>
						<?php endif; ?>		
					</div>			
					<div class="feature-content">
						<h3 class="h3-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>	</a></h3>
						
							<p><?php echo esc_html(substr(get_the_excerpt(),0,get_theme_mod('excerpt_blog','55') )); ?></p>
						
					</div>
					<div class="feature-details">
						<span><i class="fa fa-picture-o"></i></span>					
						<span><i class="fa fa-calendar"></i><?php echo get_the_date('d M y'); ?></span>
						<span><i class="fa fa-user"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo get_the_author(); ?></a></span>					
					</div>		
				</div>
			</div>
			<?php if($i%3==0){ echo "<div class='clearfix'></div>"; } $i++; 
		endwhile; ?>		
	</div>
	<ul class="post-footer post-btn1"><li><a class="append-button btn btn-color"><?php esc_html_e('Show More', 'weblizar'); ?></a></li></ul>
</div>