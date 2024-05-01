<div class="lws_tk_configpage">

    <table style="border-collapse: collapse;">
        <tbody>
            <tr class="lws_tk_tab_line">
                <td class="lws_tk_td_tabletools lws_tk_toolspage_tb_left">
                    <span><?php esc_html_e('Allows you to disconnect every user from your website. Will not disconnect your current session.', 'lws-tools'); ?></span>
                </td>
                <td class="lws_tk_td_tabletools">
                    <button class="lws_tk_general_button_notif" id="lws_tk_disconnect_all" onclick="">
                        <span class="" name="update"><?php esc_html_e('Disconnect everyone', 'lws-tools'); ?></span>
                        <span class="hidden" name="loading">
                            <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                            <span id="loading_1"><?php esc_html_e("Disconnexion...", "lws-tools");?></span>
                        </span> 
                        <span class="hidden" name="validated">
                            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                            <?php esc_html_e('Disconnected', 'lws-tools'); ?> &nbsp; 
                        </span>
                    </button>
                </td>
            </tr>
            
            <tr class="lws_tk_tab_line">
                <td class="lws_tk_td_tabletools lws_tk_toolspage_tb_left">
                    <span>
                        <?php esc_html_e('Delete every revisions older than ', 'lws-tools'); ?> 
                        <input style="width:120px" id="lws_tk_select_days_revision" type="number" min="0" value="1"/> 
                        <?php esc_html_e(' day(s) from the database.', 'lws-tools'); ?>
                    </span>
                </td>
                <td class="lws_tk_td_tabletools">
                    <button class="lws_tk_general_button_notif lws_tk_delete_button_notif" id="lws_tk_delete_revisions">
                        <span class="" name="update"><?php printf(esc_html__('Delete %d revision(s)', 'lws-tools'), $revisions_amount); ?></span>
                        <span class="hidden" name="loading">
                            <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                            <span id="loading_1"><?php esc_html_e("Deletion...", "lws-tools");?></span>
                        </span> 
                        <span class="hidden" name="validated">
                            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                            <?php esc_html_e('Deleted', 'lws-tools'); ?> &nbsp; 
                        </span>            
                    </button>
                </td>
            </tr>
            
            <tr class="lws_tk_tab_line">
                <td class="lws_tk_td_tabletools lws_tk_toolspage_tb_left">
                    <span><?php esc_html_e('Delete every trashed comments ', 'lws-tools'); ?> </span>
                </td>
                <td class="lws_tk_td_tabletools">
                    <button class="lws_tk_general_button_notif lws_tk_delete_button_notif" id="lws_tk_delete_trashed_comments">            
                        <span class="" name="update"><?php printf(esc_html__('Delete %d comments(s)', 'lws-tools'), $trashed_comments); ?></span>
                        <span class="hidden" name="loading">
                            <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                            <span id="loading_1"><?php esc_html_e("Deletion...", "lws-tools");?></span>
                        </span> 
                        <span class="hidden" name="validated">
                            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                            <?php esc_html_e('Deleted', 'lws-tools'); ?> &nbsp; 
                        </span>            
                    </button>
                </td>
            </tr>
            
            <tr class="lws_tk_tab_line">
                <td class="lws_tk_td_tabletools lws_tk_toolspage_tb_left">
                    <span><?php esc_html_e('Delete every spam comments ', 'lws-tools'); ?> </span>
                </td>
                <td class="lws_tk_td_tabletools">
                    <button class="lws_tk_general_button_notif lws_tk_delete_button_notif" id="lws_tk_delete_spam_comments">            
                        <span class="" name="update"><?php printf(esc_html__('Delete %d comments(s)', 'lws-tools'), $spam_comments); ?></span>
                        <span class="hidden" name="loading">
                            <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                            <span id="loading_1"><?php esc_html_e("Deletion...", "lws-tools");?></span>
                        </span>
                        <span class="hidden" name="validated">
                            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                            <?php esc_html_e('Deleted', 'lws-tools'); ?> &nbsp; 
                        </span>             
                    </button>
                </td>
            </tr>
                
            <tr class="lws_tk_tab_line">
                <td class="lws_tk_td_tabletools lws_tk_toolspage_tb_left">
                    <span><?php esc_html_e('Clear old temporary data (transients) from cache', 'lws-tools'); ?> </span>
                </td>
                <td class="lws_tk_td_tabletools">
                    <button class="lws_tk_general_button_notif" id="lws_tk_delete_transients">            
                        <span class="" name="update"><?php esc_html_e('Clear cache', 'lws-tools'); ?></span>
                        <span class="hidden" name="loading">
                            <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                            <span id="loading_1"><?php esc_html_e("Clearing...", "lws-tools");?></span>
                        </span> 
                        <span class="hidden" name="validated">
                            <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                            <?php esc_html_e('Cleared', 'lws-tools'); ?> &nbsp; 
                        </span>            
                    </button>
                </td>
            </tr>

            <tr class="lws_tk_tab_line">        
                <form method="POST">
                    <td class="lws_tk_td_tabletools lws_tk_toolspage_tb_left">
                        <span><?php esc_html_e('Reset the plugin configuration', 'lws-tools'); ?> </span>
                    </td>
                    <td class="lws_tk_td_tabletools">
                        <button class="lws_tk_general_button_notif" id ="lws_tk_reset_plugin" name="lws_tk_reset_plugin">            
                            <span class="" name="update"><?php esc_html_e('Reset', 'lws-tools'); ?></span>       
                            <span class="hidden" name="loading">
                                <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                            </span>
                        </button>
                    </td>
                </form>
            </tr>

            <tr> 
                <td class="lws_tk_td_tabletools">
                    <input type="checkbox" id="lws_tk_keep_changes" name="lws_tk_keep_changes" <?php echo get_option('lws_tk_keep_data_on_delete') ? esc_attr('checked') : '';?>>       
                    <span><?php esc_html_e('Keep configuration even after deleting the plugin', 'lws-tools'); ?> </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    jQuery('#lws_tk_disconnect_all').on('click', function(){
        let button = this;
        let button_id = this.id;
        console.log(this.children);
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button_tools');
        button.setAttribute('disabled', true);
        var data = {
            action: "lwstools_disconnectall",
		};
        jQuery.post(ajaxurl, data, function(response) { 
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button_tools');
            button.prop('disabled', false);
        });
    });
    
    jQuery('#lws_tk_delete_revisions').on('click', function(){
        let button = this;
        let button_id = this.id;
        console.log(this.children);
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button_tools');
        button.setAttribute('disabled', true);
        var days = jQuery('#lws_tk_select_days_revision').val();
        var data = {
            lws_tk_days_revisions: days,
            action: "lwstools_delete_revisions",
		};
        jQuery.post(ajaxurl, data, function(response) { 
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button_tools');
            button.prop('disabled', false);
        });
    });

        
    jQuery('#lws_tk_reset_plugin').on('click', function(){
        let button = this;
        button.children[0].classList.add('hidden');
        button.children[1].classList.remove('hidden');
    });
    
    jQuery('#lws_tk_delete_trashed_comments').on('click', function(){
        let button = this;
        let button_id = this.id;
        console.log(this.children);
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button_tools');
        button.setAttribute('disabled', true);
        var data = {
            action: "lwstools_delete_trash_comments",
		};
        jQuery.post(ajaxurl, data, function(response) { 
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button_tools');
            button.prop('disabled', false);
        });
    });
        
    jQuery('#lws_tk_delete_spam_comments').on('click', function(){
        let button = this;
        let button_id = this.id;
        console.log(this.children);
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button_tools');
        button.setAttribute('disabled', true);
        var data = {
            action: "lwstools_delete_spam_comments",
		};
        jQuery.post(ajaxurl, data, function(response) { 
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button_tools');
            button.prop('disabled', false);
        });
    });
    
    jQuery('#lws_tk_delete_transients').on('click', function(){
        let button = this;
        let button_id = this.id;
        console.log(this.children);
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button_tools');
        button.setAttribute('disabled', true);
        var data = {
            action: "lwstools_delete_transients",
		};
        jQuery.post(ajaxurl, data, function(response) { 
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button_tools');
            button.prop('disabled', false);
        });
    });

    jQuery('#lws_tk_keep_changes').on('change', function(){
        var data = {
            action: "lwstools_keep_changes",
            state: this.checked,
		};
        jQuery.post(ajaxurl, data);

    });

    
</script>
