<?php 
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage weblizar
 */
get_header(); ?>
<div class="top-title-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 page-info">
			<?php /* translators: %s: search item */ ?>
                <h1 class="h1-page-title"><?php printf( esc_html__( 'Search Results for: %s', 'weblizar' ), '<span>' . get_search_query() . '</span>' ); ?></h1>		
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
					<!-- Blog Post -->
					<div class="blog-post">
						
						<?php if ( have_posts() ) : 
							while(have_posts()): the_post(); ?>							
								<div class="blog-span"><?php /* Start the Loop */ ?>			
									<?php get_template_part( 'content', get_post_format() ); ?>
									<div class="space-sep20"></div>
								</div>
							<?php endwhile; ?>
							<div class="text-center wl-theme-pagination">
						        <?php echo esc_html( the_posts_pagination( array( 'mid_size' => 2 ) ) ); ?>
						        <div class="clearfix"></div>
						    </div>
						<?php else : ?>
							<div class="blog-span">	
								<header class="entry-header">
									<h1 class="entry-title"><?php echo esc_html__( 'Nothing Found', 'weblizar' ); ?></h1>
								</header>

								<div class="entry-content">
									<p><?php echo esc_html__( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'weblizar' ); ?></p>
									<?php get_search_form(); ?>
								</div><!-- .entry-content -->
							</div>
						<?php endif; ?>
					</div>
				</div>   
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>