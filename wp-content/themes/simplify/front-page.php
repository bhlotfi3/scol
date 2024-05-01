<?php
/*
	Simplify Theme's Front Page
	Simplify Theme's Front Page to Display the Home Page if Selected
	Copyright: 2012-2021, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Simplify 1.0
*/
 
get_header(); ?>
<div id="rsize"></div>
<?php
$heading_text = ''; $heading_text = esc_html(simplify_get_option('heading_text',''));
if($heading_text) $heading_text = '<h1 id="heading">'.$heading_text.'</h1>';
$heading_des = ''; $heading_des = esc_html(simplify_get_option('heading_des', ''));
if($heading_des) $heading_des = '<p class="heading-desc">'.$heading_des.'</p>';
$bannerimage = ''; $bannerimage = esc_url(simplify_get_option('banner-image', ''));
if($bannerimage) $bannerimage = '<img class="slideimage" src="'.$bannerimage.'" />';
$slideimage = ''; $slideimage = esc_url(simplify_get_option('slide-image', ''));
if($slideimage) $slideimage = '<img class="slideimage" src="'.$slideimage.'" />';
$extraimage = ''; $extraimage = esc_url(simplify_get_option('extra-image', ''));
if($extraimage) $extraimage = '<img class="slideimage" src="'.$extraimage.'" />';
if($heading_text|| $heading_des || $bannerimage || $slideimage || $extraimage):
?>
<div id="header-bottom">
	<?php
	echo $heading_text;
	echo $heading_des;
	if($bannerimage || $slideimage || $extraimage):
	?>
	<div id="slidebottom"></div>
	<div id="slide-container">
		<div id="slide">
			<?php echo $bannerimage.$slideimage.$extraimage; ?>
		</div>
	</div> <!-- slide-container -->
	<?php endif; ?>	
</div>
<?php endif; ?>
<div id="container">
<?php get_template_part( 'featured-box' ); ?>

<br /><br /><div class="clear"></div>

<?php  get_template_part( 'front-page-blog' ); ?> 

<?php 
$bquote = ''; $bquote = esc_html(simplify_get_option('bottom-quotation','')); 	
if ( $bquote ) $bquote = '<div id="customers-comment"><blockquote>'.$bquote.'</blockquote></div>'; 
echo $bquote;	

get_footer();