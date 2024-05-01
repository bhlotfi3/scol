<?php 
/**
 * The template for displaying Author Post
 *
 * @package WordPress
 * @subpackage weblizar
 */
get_header(); ?>
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 page-info">
				<?php /* translators: %s: author name */ ?>
                <h1 class="h1-page-title"><?php printf( esc_html__( 'Author Archives: %s', 'weblizar' ), get_the_author() ); ?></h1>				
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
					<h1></h1>
					<?php while(have_posts()):the_post();
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