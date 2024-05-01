<?php
/* 	Simplify Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2012-2021, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Simplify 1.0
*/
$featuredbox = '';
$featureditem = '';
$featuredtitle = ''; $featuredtitle = esc_html(simplify_get_option('featuredr-title', ''));
if($featuredtitle) $featureditem .= '<h2>'.$featuredtitle.'</h2>';
$featureddes = ''; $featureddes = wp_kses_post(simplify_get_option('featuredr-description',  ''));
if($featureddes) $featureditem .= '<div class="content-ver-sep"></div><br /><p>'.$featureddes.'</p>';
if($featureditem) $featuredbox .= '<br /><span class="featured-box featured-box-first">'.$featureditem.'</span>';
 
foreach (range(1, 3) as $fboxn) {
	$featureditem = '';
	$featuredlink = ''; $featuredlink = esc_url(simplify_get_option('featured-link' . $fboxn, ''));
	$featuredimg = ''; $featuredimg = esc_url(simplify_get_option('featured-image' . $fboxn, ''));	
	$featuredtitle = ''; $featuredtitle = esc_html(simplify_get_option('featured-title' . $fboxn, ''));	
	$featureddes = ''; $featureddes = esc_html(simplify_get_option('featured-description'. $fboxn,  ''));	
	
	if($featuredlink)  $featureditem .= '<a href="'.$featuredlink.'">';
	if($featuredimg) $featureditem .= '<img class="box-image" src="'.$featuredimg.'"/>';
	if($featuredtitle) $featureditem .= '<h3>'.$featuredtitle.'</h3>';
	if($featuredlink)  $featureditem .= '</a>';
	if($featureddes) $featureditem .= '<div class="content-ver-sep"></div><br /><p>'.$featureddes.'</p>';
	
	if($featureditem) $featuredbox .= '<span class="featured-box">'.$featureditem.'</span>';
}
$srfbox = esc_html(simplify_get_option('srfbox', ''));	
if ( $srfbox ): 
	$featuredbox .= '<div class="clear"></div><br /><div class="lsep"></div><br /><br />'; 

	$featureditem = '';
	$featuredtitle = ''; $featuredtitle = esc_html(simplify_get_option('featuredr2-title', ''));
	if($featuredtitle) $featureditem .= '<h2>'.$featuredtitle.'</h2>';
	$featureddes = ''; $featureddes = wp_kses_post(simplify_get_option('featuredr2-description',  ''));
	if($featureddes) $featureditem .= '<div class="content-ver-sep"></div><br /><p>'.$featureddes.'</p>';
	if($featureditem) $featuredbox .= '<br /><span class="featured-box featured-box-first">'.$featureditem.'</span>';

	foreach (range(1, 3) as $fboxn2) {
		$featureditem = '';
		$featuredlink = ''; $featuredlink = esc_url(simplify_get_option('featured-link2' . $fboxn2, ''));	
		$featuredimg = ''; $featuredimg = esc_url(simplify_get_option('featured-image2' . $fboxn2, ''));	
		$featuredtitle = ''; $featuredtitle = esc_html(simplify_get_option('featured-title2' . $fboxn2, ''));	
		$featureddes = ''; $featureddes = esc_html(simplify_get_option('featured-description2'. $fboxn2,  ''));	

		if($featuredlink)  $featureditem .= '<a href="'.$featuredlink.'">';
		if($featuredimg) $featureditem .= '<img class="box-icon" src="'.$featuredimg.'"/>';
		if($featuredtitle) $featureditem .= '<h3 class="featured-box2">'.$featuredtitle.'</h3>';
		if($featuredlink)  $featureditem .= '</a>';
		if($featureddes) $featureditem .= '<br /><p>'.$featureddes.'</p>';		
		if($featureditem) $featuredbox .= '<span class="featured-box">'.$featureditem.'</span>';
	}	
endif;
if($featuredbox) echo '<div id="featured-boxs">'.$featuredbox.'</div>';