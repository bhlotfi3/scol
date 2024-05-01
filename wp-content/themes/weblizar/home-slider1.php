<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>        
    <li data-target="#myCarousel" data-slide-to="2"></li>        
  </ol>
  <div class="carousel-inner">
  <?php 
	$ImageUrl1 = get_template_directory_uri() ."/images/slide-1.jpg";
	$ImageUrl2 = get_template_directory_uri() ."/images/slide-2.jpg";
	$ImageUrl3 = get_template_directory_uri() ."/images/slide-3.jpg";  ?>
    <div class="carousel-item active">
		<?php 
    $slide_image = get_theme_mod('slide_image',$ImageUrl1);
    if(!empty($slide_image)) {  ?>
      <img src="<?php echo esc_url($slide_image); ?>" class="img-responsive" alt="First slide">
    <?php } else { ?>
	  <img src="<?php echo esc_url($ImageUrl1); ?>" class="img-responsive" alt="First slide">
	  <?php } ?>		  
	  <div class="container">
        <div class="carousel-caption">
		<?php 
    $slide_title = get_theme_mod('slide_title','Welcome To Weblizar Slider 1');
    if(!empty($slide_title)) {  ?>
          <h1 class="weblizar_slide_title"><?php echo esc_html($slide_title); ?></h1>
		<?php } 	
    $slide_desc = get_theme_mod('slide_desc','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','weblizar');
		 if(!empty($slide_desc)) {  ?>
		 <p class="weblizar_slide_desc"><?php echo esc_html($slide_desc); ?></p>
		 <?php }
     $slide_btn_text = get_theme_mod('slide_btn_text','Read More');
     $slide_btn_link = get_theme_mod('slide_btn_link','#');
			if(!empty($slide_btn_text)) { ?>
          <p class="weblizar_slide_btn_text"><a class="btn btn-lg btn-primary" href="<?php if(!empty($slide_btn_link)) { echo esc_url($slide_btn_link); } ?>" role="button"><?php echo esc_html($slide_btn_text); ?></a></p>
		  <?php } ?>
        </div>
      </div>
    </div>		
    <div class="carousel-item">		
		<?php 
    $slide_image_1 = get_theme_mod('slide_image_1',$ImageUrl2);
    if(!empty($slide_image_1)) {  ?>
      <img src="<?php echo esc_url($slide_image_1); ?>" class="img-responsive" alt="Second slide">
      <?php } else { ?>
	  <img src="<?php echo esc_url($ImageUrl2); ?>" class="img-responsive" alt="Second slide">
	  <?php } ?>
      <div class="container">
        <div class="carousel-caption">
		<?php 
    $slide_title_1 = get_theme_mod('slide_title_1','Welcome To Weblizar Slider 2');
    if(!empty($slide_title_1)) {  ?>
    
          <h1 class="weblizar_slide_title_1"><?php echo esc_html($slide_title_1); ?></h1>
		<?php } 
    $slide_desc_1 = get_theme_mod('slide_desc_1','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','weblizar');
     if(!empty($slide_desc_1)) {  	 ?>
		  <p class="weblizar_slide_desc_1"><?php echo esc_html($slide_desc_1); ?></p>
		 <?php }
     $slide_btn_text_1 = get_theme_mod('slide_btn_text_1','Read More');
     $slide_btn_link_1 = get_theme_mod('slide_btn_link_1','#');
      if(!empty($slide_btn_text_1)) {  ?>
          <p class="weblizar_slide_btn_text_1"><a class="btn btn-lg btn-primary" href="<?php if(!empty($slide_btn_link_1)) { echo esc_url($slide_btn_link_1); } ?>" role="button"><?php echo esc_html($slide_btn_text_1); ?></a></p>
		  <?php } ?>
        </div>
      </div>
    </div>
	<div class="carousel-item">		
		<?php 
    $slide_image_2 = get_theme_mod('slide_image_2',$ImageUrl3);
    if(!empty($slide_image_2)) { ?>
      <img src="<?php echo esc_url($slide_image_2); ?>" class="img-responsive" alt="Third slide">
      <?php } else { ?>
	  <img src="<?php echo esc_url($ImageUrl3); ?>" class="img-responsive" alt="Third slide">
	  <?php } ?>
      <div class="container">
        <div class="carousel-caption">
		<?php 
    $slide_title_2 = get_theme_mod('slide_title_2','Welcome To Weblizar Slider 3');
    if(!empty($slide_title_2)) { ?>
          <h1 class="weblizar_slide_title_2"><?php echo esc_html($slide_title_2); ?></h1>
		<?php } 
    $slide_desc_2 = get_theme_mod('slide_desc_2','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','weblizar');
     if(!empty($slide_desc_2)) { 	 ?>
		 <p class="weblizar_slide_desc_2"><?php echo esc_html($slide_desc_2); ?></p>
		 <?php }
     $slide_btn_text_2 = get_theme_mod('slide_btn_text_2','Read More');
     $slide_btn_link_2 = get_theme_mod('slide_btn_link_2','#');
      if(!empty($slide_btn_text_2)) { ?>
          <p class="weblizar_slide_btn_text_2"><a class="btn btn-lg btn-primary" href="<?php if(!empty($slide_btn_link_2)) { echo esc_url($slide_btn_link_2); } ?>" role="button"><?php echo esc_html($slide_btn_text_2); ?></a></p>
		  <?php } ?>
        </div>
      </div>
    </div>
	
  </div>
  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev"><span
                class="carousel-control-prev-icon"></span></a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next"><span
                class="carousel-control-next-icon"></span></a>
</div><!-- /.carousel -->