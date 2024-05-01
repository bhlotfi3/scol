<?php 
/**
 * The template for displaying Tags  
 
 * @package WordPress
 * @subpackage weblizar
 */
get_header(); ?>
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 page-info">
                <h1 class="h1-page-title"><?php the_archive_title("", false); ?></h1>				
            </div>
        </div>
    </div>
</div>
<div class="space-sep20"></div>	
<div class="content-wrapper">
	<div class="body-wrapper">
		<div class="container">	
			<div class="row">		
				<!--Blog Content-->
				<div class="col-md-9 col-sm-9">
					<?php if ( have_posts() ) : ?>	
						<?php while(have_posts()): the_post(); 
							get_template_part( 'content', get_post_format() );
						endwhile; ?>		
						<div class="text-center wl-theme-pagination">
					        <?php echo esc_html( the_posts_pagination( array( 'mid_size' => 2 ) ) ); ?>
					        <div class="clearfix"></div>
				    	</div>
					<?php endif; ?>
				</div>
				<?php wp_link_pages();?>
				<?php get_sidebar(); ?>	
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>