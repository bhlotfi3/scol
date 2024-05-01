<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage weblizar
 */
get_header(); ?>
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 page-info">
                <h1 class="h1-page-title">
					<?php if ( is_day() ) : ?>
						<?php esc_html_e( "Daily Archives:", 'weblizar' ); echo (get_the_date()); ?>
					<?php elseif ( is_month() ) : ?>
						<?php  esc_html_e( "Monthly Archives:", 'weblizar' ); echo (get_the_date( 'F Y' )); ?>
					<?php elseif ( is_year() ) : ?>
						<?php esc_html_e( "Yearly Archives:", 'weblizar' );  echo (get_the_date( 'Y' )); ?>
					<?php else : ?>
						<?php esc_html_e( "Blog Archives", 'weblizar' ); ?>
					<?php endif; ?>				
				</h1>				
            </div>
        </div>
    </div>
</div>
<div class="space-sep20"></div>	

<div class="content-wrapper">
	<div class="body-wrapper">
	    <div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<?php 	
					while(have_posts()):the_post();
						get_template_part( 'content', get_post_format() );
					endwhile; ?>				
					
					<div class="text-center wl-theme-pagination">
				        <?php echo esc_html( the_posts_pagination( array( 'mid_size' => 2 ) ) ); ?>
				        <div class="clearfix"></div>
				    </div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>