jQuery(document).ready(function(){ 'use strict'; 
	jQuery("#main-menu-con ul ul").css({display: "none"}); jQuery('#main-menu-con ul li').hover( function() { jQuery(this).find('ul:first').slideDown(200).css('visibility', 'visible'); jQuery(this).addClass('selected'); }, function() { jQuery(this).find('ul:first').slideUp(200); jQuery(this).removeClass('selected'); });
	
	jQuery('#mobile-menu').click(function(){ jQuery('#main-menu-con').toggle(); });	  
});

jQuery(window).on('load resize', function () { 	'use strict';			  
	if(jQuery('#slide-container').length) {
		var rSize = jQuery('#rsize').width();
		var sWidth = jQuery('#slide-container').width();
		var sbHeight = 	sWidth*0.143;
		jQuery('#slidebottom').height(sbHeight);

		if( rSize < 10 ){
			jQuery('#slide').attr('id','rslidex');
			jQuery( '#rslidex .slideimage' ).wrap( '<li class="slideimageli"></li>' );
			jQuery( '.slideimageli' ).wrapAll( "<ul id='rslide' />");

			jQuery("#rslide").responsiveSlides({		  
				speed: 500,           
				timeout: 5000, 
				nav: true,
				pager: false,             
				prevText: "",   
				nextText: "" 				
			});
		} else {
			jQuery('#slide').jqFancyTransitions({  width: 930, height: 350, strips: 19, position: 'alternate', direction: 'fountainAlternate',  effect: 'zipper', navigation: true, links : false 	});
		}
	}
											  
});

jQuery(window).on('load resize', function () { 	'use strict';
    jQuery(".menu-item-has-children, .page_item_has_children").on('mouseenter mouseleave', function () { 
        if (jQuery('ul', this).length) {
            var elm = jQuery('ul:first', this);
            var off = elm.offset();
            var l = off.left;
            var w = elm.width();
            var docW = jQuery("#site-container").width();
			var t = jQuery("#site-container").offset().left;
            var isEntirelyVisible = (l + w <= docW + t);
            if (!isEntirelyVisible) {
                jQuery(this).addClass('smedge');
            } else {
                jQuery(this).removeClass('smedge');
            }
        }
    });
});