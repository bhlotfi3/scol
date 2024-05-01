<div class="configpage">

    <div id="lws_ht_banner"></div>
    
    <h3 class="lws-ht-titre"><?php esc_html_e("What does this plugin do?", "lws-hide-login") ?></h3>
        <p class="lws-ht-text-p">
            <?php echo wp_kses(__("This plugin allows you to <strong>hide your dashboard as well as the login page to non-registered users.</strong> ", "lws-hide-login"), array('strong' => array())); ?>
            <?php esc_html_e("Those changes make your website more secure against hacking and help prevent unauthorized access.", "lws-hide-login");?> <br>
            <?php esc_html_e("By default, the login page is modified from \"wp-login.php\" to \"lws-lg-in\" but you can change it however you like.", "lws-hide-login");?>
            <?php esc_html_e("The same goes for the 404 page, shown when trying to access those pages. You can change it to a page of your choice.", "lws-hide-login");
            ?>
        </p>

    <h3 class="lws-ht-titre"><?php esc_html_e("Why should I secure my website?", "lws-hide-login"); ?></h3>
        <p class="lws-ht-text-p">
            <?php esc_html_e("Securing your website with our plugin make it harder for hackers and malicious people to access confidential or private data.", "lws-hide-login");?> <br>
            <?php esc_html_e("It is not only protecting your data but also the data of everyone accessing your website. It makes it harder to find how to log in, discouraging lots of people from actually trying to hack you.", "lws-hide-login");?>
        </p>
        
        <p class="lws-ht-text-p">
            <?php esc_html_e("Of course, it is not perfect, if someone truly want yo hack you, they will try everything.", "lws-hide-login");?>
            <?php esc_html_e("That is why you need to take the security of your website with seriousness.", "lws-hide-login");?>
        </p>
    
    
    <h3 class="lws-ht-titre"><?php esc_html_e("Securing my website", "lws-hide-login"); ?></h3>
    
        <?php if (is_multisite() && $plugin_active_network ) : ?>
            <div class="form_update_success">
            <?php if (current_user_can( 'setup_network' )) : ?>
                <?php esc_html_e('To change the redirections, please go on this plugin\'s page in your Network Settings.', 'lws-hide-login'); ?>
            <?php else : ?>
                <?php esc_html_e('Please ask your Network Administrator to change the redirections for you.', 'lws-hide-login'); ?>
            <?php endif ?>
            </div>
        <?php endif ?>
        
        <?php if (isset($form_updated)) : ?>
            <div class="form_update_success">
                <?php echo esc_html($form_updated); ?>
            </div>
        <?php endif ?>
        
        <div class="lws-ht-formbloc">
            <fieldset class="lws_ht_fieldset_config" id="lws_ht_form_fieldset_config">
                <form method="POST">
                    <div class="lws_ht_form_fields">
                        <div class="lws_ht_field left_field">
                            <h3> <?php esc_html_e("Dashboard redirection", "lws-hide-login"); ?></h3>
                            <div id="lws_ht_input_change_redirection">
                                <span class="website_url_span"><?php echo esc_url(get_site_url() . "/"); ?></span> <input type="text" value="<?php echo esc_html(get_option('lws_aff_new_redirection') ? get_option('lws_aff_new_redirection') : "404"); ?>" name="input_change_redirection">
                            </div>  
                        </div>
                        <div class="lws_ht_field">
                            <h3> <?php esc_html_e("New login address", "lws-hide-login"); ?></h3>
                            <div id="lws_ht_input_change_login">
                                <span class="website_url_span"><?php echo esc_url(get_site_url() . "/"); ?></span> <input type="text" value="<?php echo esc_html(get_option('lws_aff_new_login') ? get_option('lws_aff_new_login') : ""); ?>" name="input_change_login" required>
                            </div>
                        </div>
                    </div>
                        
                    <input class="button_update_redirect" name="lws_ht_form_change_hide_page" type="submit" id="lws_ht_button_confirm" value="<?php esc_html_e('Modify redirections', "lws-hide-login"); ?>">
                </form>
            </fieldset>
        </div>
</div>

<?php if (is_multisite() && $plugin_active_network ) : ?>
    <script>
        jQuery('#lws_ht_form_fieldset_config').prop('disabled', true);
    </script>
<?php endif ?>
