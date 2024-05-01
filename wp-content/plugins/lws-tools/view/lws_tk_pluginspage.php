<div class="lws_tk_configpage">
    <h3 class="lws-tk-titre"><?php esc_html_e("Discover our plugins", "lws-tools") ?></h3>
    
    <p class="lws-ht-text-p">
        <?php esc_html_e("We, at LWS, have developped a few different plugins for WordPress that you may find below.", "lws-tools"); ?>
        <?php esc_html_e("You just have to click on the \"Install now\" button to get them for free.", "lws-tools"); ?> <br>
    </p>
    
    <h3 class="lws-ht-titre">
        <img width="30px" height="30px"  class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/plugin_lws_hide_login_page.svg')?>">
        <?php esc_html_e("LWS Hide Login", "lws-tools") ?>
    </h3>
    <p class="lws-ht-text-p">
        <?php esc_html_e("This plugin hide your admin page (wp-admin) and let you change your login page (wp-login).", "lws-tools"); ?> <br>
        <?php esc_html_e("It allows for better security as hacker will have more troubles finidng the right page.", "lws-tools"); ?> <br>

        <button style="margin-top:20px" class="lws_tk_general_install_button" onclick="download_lws_plugins(this)" id="lwshidelogin">
        <span class="" name="install-now"><?php esc_html_e('Install now', 'lws-tools'); ?></span>
        <span class="hidden" name="loading">
            <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
            <span id="loading_1"><?php esc_html_e("Install in progress...", "lws-tools");?></span>
            <span class="hidden" id="loading_2"><?php esc_html_e("Activation in progress...", "lws-tools");?></span>
        </span>
        <span class="hidden" name="activate"><?php echo esc_html_e('Activate', 'lws-tools'); ?></span>
        <span class="hidden" name="validated">
            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
            <?php esc_html_e('Activated', 'lws-tools'); ?> &nbsp; 
        </span>
        <span class="hidden" name="failed">
            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/croix.svg')?>">
            <?php echo esc_html_e('Failed to download', 'lws-tools'); ?>
            </span>
        </button>
        
    </p>
    
    <h3 class="lws-ht-titre">
        <img width="30px" height="30px"  class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/plugin_lws_sms_logo.svg')?>">
        <?php esc_html_e("LWS SMS", "lws-tools") ?>
    </h3>
    <p class="lws-ht-text-p">
        <?php esc_html_e("This plugin, designed especially for WooCommerce, allows you to send SMS to your customers automatically.", "lws-tools"); ?> <br>
        <?php esc_html_e("You will need an account at LWS and enough balance to actually send SMS.", "lws-tools"); ?>
        <?php esc_html_e("You can create personnalized templates, manage your SMS and sender IDs and more!", "lws-tools"); ?> <br>
        
        <button style="margin-top:20px" class="lws_tk_general_install_button" onclick="download_lws_plugins(this)" id="lws-sms">
        <span class="" name="install-now"><?php esc_html_e('Install now', 'lws-tools'); ?></span>
        <span class="hidden" name="loading">
            <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
            <span id="loading_1"><?php esc_html_e("Install in progress...", "lws-tools");?></span>
            <span class="hidden" id="loading_2"><?php esc_html_e("Activation in progress...", "lws-tools");?></span>
        </span>
        <span class="hidden" name="activate"><?php echo esc_html_e('Activate', 'lws-tools'); ?></span>
        <span class="hidden" name="validated">
            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
            <?php esc_html_e('Activated', 'lws-tools'); ?> &nbsp; 
        </span>
        <span class="hidden" name="failed">
            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/croix.svg')?>">
            <?php echo esc_html_e('Failed to download', 'lws-tools'); ?>
            </span>
        </button>
        
    </p>

    <h3 class="lws-ht-titre">
        <img width="30px" height="27px" class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/plugin_lws_affiliation_page.svg')?>">
        <?php esc_html_e("LWS Affiliation", "lws-tools"); ?>
    </h3>
    <p class="lws-ht-text-p">
        <?php esc_html_e("With this plugin, you can add banners and widgets on your website to use with your affiliate account.", "lws-tools");?> <br>
        <?php esc_html_e("Earn money and keep track of your gains directly on your website.", "lws-tools"); ?> <br>
        
        <button style="margin-top:20px" class="lws_tk_general_install_button" onclick="download_lws_plugins(this)" id="lwsaffiliation">
        <span class="" name="install-now"><?php esc_html_e('Install now', 'lws-tools'); ?></span>
        <span class="hidden" name="loading">
            <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
            <span id="loading_1"><?php esc_html_e("Install in progress...", "lws-tools");?></span>
            <span class="hidden" id="loading_2"><?php esc_html_e("Activation in progress...", "lws-tools");?></span>
        </span>
        <span class="hidden" name="activate"><?php echo esc_html_e('Activate', 'lws-tools'); ?></span>
        <span class="hidden" name="validated">
            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
            <?php esc_html_e('Activated', 'lws-tools'); ?> &nbsp; 
        </span>
        <span class="hidden" name="failed">
            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/croix.svg')?>">
            <?php echo esc_html_e('Failed to download', 'lws-tools'); ?>
            </span>
        </button>
        
    </p>

    <h3 class="lws-ht-titre">
        <img width="30px" height="30px" class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/fastest_cache_logo.svg')?>">
        <?php esc_html_e("LWSCache", "lws-tools"); ?>
    </h3>
    <p class="lws-ht-text-p">
        <?php esc_html_e("Based on Varnish cache and Nginx, LWSCache speed up the loading of your webpages. This plugin help you automatically manage your LWSCache when you edit your pages, posts, messages...", "lws-tools");?> <br>
        <?php esc_html_e("It provide a way to purge all your cache but will only work on server using this system.", "lws-tools");?> <br>
        
        <button style="margin-top:20px" class="lws_tk_general_install_button" onclick="download_lws_plugins(this)" id="lwscache">
        <span class="" name="install-now"><?php esc_html_e('Install now', 'lws-tools'); ?></span>
        <span class="hidden" name="loading">
            <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
            <span id="loading_1"><?php esc_html_e("Install in progress...", "lws-tools");?></span>
            <span class="hidden" id="loading_2"><?php esc_html_e("Activation in progress...", "lws-tools");?></span>
        </span>
        <span class="hidden" name="activate"><?php echo esc_html_e('Activate', 'lws-tools'); ?></span>
        <span class="hidden" name="validated">
            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
            <?php esc_html_e('Activated', 'lws-tools'); ?> &nbsp; 
        </span>
        <span class="hidden" name="failed">
            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/croix.svg')?>">
            <?php echo esc_html_e('Failed to download', 'lws-tools'); ?>
            </span>
        </button>
        
    </p>
    
</div>

<script>
    <?php foreach ($plugins_activated as $slug => $activated) : ?>
        <?php if ($activated == "full") : ?>
            var button = jQuery("<?php echo esc_attr("#" . $slug); ?>");
            button.children()[3].classList.remove('hidden');
            button.children()[0].classList.add('hidden');
            button.prop('onclick', false);
            button.addClass('lws_tk_validated_button');
        <?php elseif ($activated == "half") : ?>
            var button = jQuery("<?php echo esc_attr("#" . $slug); ?>");
            button.children()[2].classList.remove('hidden');
            button.children()[0].classList.add('hidden');
            button.children()[1].children[1].classList.add('hidden');
            button.children()[1].children[2].classList.remove('hidden');
        <?php endif ?>
    <?php endforeach ?>

    function download_lws_plugins(button){
        
        button.children[0].classList.add('hidden');
        button.children[4].classList.add('hidden');
        button.children[3].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_failed_button');
        button.classList.remove('lws_tk_validated_button');
        button.setAttribute('disabled', true);
        
        var data = {
            action: "lwstools_downloadPlugin",
            _ajax_nonce : '<?php echo esc_attr(wp_create_nonce( 'updates' )); ?>',
            slug: button.getAttribute('id'),
		};
        jQuery.post(ajaxurl, data, function(response) {
            var success = response.success;
            var slug = response.data.slug;
            if (!success){
                if (response.data.errorCode == 'folder_exists'){
                    var data = {
                        action: "lwstools_activatePlugin",
                        ajax_slug: slug,
            		};
            		jQuery.post(ajaxurl, data, function(response) {
            		    jQuery('#' + slug).children()[1].classList.add('hidden');
                        jQuery('#' + slug).children()[2].classList.add('hidden');
                        jQuery('#' + slug).children()[3].classList.remove('hidden');
                        jQuery('#' + slug).addClass('lws_tk_validated_button');
            		});

                }
                else{
                    jQuery('#' + slug).children()[4].classList.remove('hidden');
                    jQuery('#' + slug).children()[1].classList.add('hidden');
                    jQuery('#' + slug).prop('disabled', false);
                    jQuery('#' + slug).addClass('lws_tk_failed_button');
                }
            }
            else{
                jQuery('#' + slug).children()[1].children[1].classList.add('hidden');
                jQuery('#' + slug).children()[1].children[2].classList.remove('hidden');
                jQuery('#' + slug).children()[1].classList.add('hidden');
                jQuery('#' + slug).children()[2].classList.remove('hidden');
                jQuery('#' + slug).prop('disabled', false);
            }
        }); 
    }
    
</script>