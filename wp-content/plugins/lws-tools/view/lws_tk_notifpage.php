<div class="lws_tk_configpage">
    <table class="lws_tk_notiftable">
        <tbody>
            <!-- Update WordPress -->
            <tr class="lws_tk_tab_line">
                <?php if ($up_to_date == "1") : ?>
                    <td class="lws_tk_td_tablenotif">
                    <span class="lws_tk_basic"><?php printf(esc_html__('Your current WordPress version (%s) is outdated and should be updated!', 'lws-tools'), $actual_version) ?></span>
                    </td>
                <?php else : ?>
                    <td class="lws_tk_td_tablenotif">
                        <span class="lws_tk_uptodate"><?php printf(esc_html__('Your current WordPress version (%s) is up-to-date.', 'lws-tools'), $actual_version) ?></span>
                    </td>
                <?php endif ?>
            </tr>
            
            <!-- Update Plugins -->
            <tr class="lws_tk_tab_line">
                <?php if (count($plugins_update)) : ?>
                
                    <td class="lws_tk_td_tablenotif">
                        <span class="lws_tk_basic"><?php printf(esc_html__('You have %d plugin(s) in need of an update.', 'lws-tools'), count($plugins_update)) ?></span>
                    </td>

                    <td class="lws_tk_td_tablenotif">
                        <button class="lws_tk_general_button_notif" name="lws_tk_update_all_plugins" onclick="lws_tk_updateAllPlugin(this)">
                            <span class="" name="update"><?php esc_html_e('Update all plugins', 'lws-tools') ?></span>
                            <span class="hidden" name="loading">
                                <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                <span id="loading_1"><?php esc_html_e("Update in progress...", "lws-tools");?></span>
                            </span>   
                            <span class="hidden" name="validated">
                                <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                                <?php esc_html_e('Updated', 'lws-tools'); ?> &nbsp; 
                            </span>
                        </button>
                    </td>
                    <?php foreach ($plugins_update as $key => $p_update) : ?>
                        <tr>
                            <td class="lws_tk_td_tablenotif_list <?php echo $key === array_key_last($plugins_update) ? esc_attr('lws_tk_td_is_last') : '' ?>">
                                <?php echo(esc_html($p_update['name'] . " - " . $p_update['version'])); ?>
                            </td>
                            <td class="lws_tk_td_tablenotif_list <?php echo $key === array_key_last($plugins_update) ? esc_attr('lws_tk_td_is_last') : '' ?>">
                                <button class="lws_tk_general_button_notif" id="<?php echo "lws_tk_update_plugin_specific_" . $p_update['slug'] ?>" name="lws_tk_update_plugin_specific" value="<?php echo(esc_attr($p_update['package'])); ?>" onclick="lws_tk_updatePlugin(this)">
                                    <span class="" name="update"><?php printf(esc_html__('Update to %s', 'lws-tools'), $p_update['new_version']) ?></span>
                                    <span class="hidden" name="loading">
                                        <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                        <span id="loading_1"><?php esc_html_e("Update in progress...", "lws-tools");?></span>
                                    </span>   
                                    <span class="hidden" name="validated">
                                        <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                                        <?php esc_html_e('Updated', 'lws-tools'); ?> &nbsp; 
                                    </span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                
                <?php else : ?>
                    <td class="lws_tk_td_tablenotif">
                    <span class="lws_tk_uptodate"><?php (esc_html_e('All your plugins are up-to-date.', 'lws-tools')) ?></span>
                    </td>
                <?php endif ?>
            </tr>
            
            <!-- Update Themes -->
            <tr class="lws_tk_tab_line">
                <?php if (count($themes_update)) : ?>
                <td class="lws_tk_td_tablenotif">
                <span class="lws_tk_basic"><?php printf(esc_html__('You have %d theme(s) in need of an update.', 'lws-tools'), count($themes_update)) ?></span>
                    <td class="lws_tk_td_tablenotif">
                        <button class="lws_tk_general_button_notif" name="lws_tk_update_all_themes" onclick="lws_tk_updateAllTheme(this)">
                            <span class="" name="update"><?php esc_html_e('Update all themes', 'lws-tools') ?></span>
                            <span class="hidden" name="loading">
                                <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                <span id="loading_1"><?php esc_html_e("Update in progress...", "lws-tools");?></span>
                            </span>   
                            <span class="hidden" name="validated">
                                <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                                <?php esc_html_e('Updated', 'lws-tools'); ?> &nbsp; 
                            </span>
                        </button>
                    </td>
                    <?php foreach ($themes_update as $key => $t_update) : ?>
                        <tr>
                            <td class="lws_tk_td_tablenotif_list <?php echo $key === array_key_last($themes_update) ? esc_attr('lws_tk_td_is_last') : '' ?>">
                                <?php echo(esc_html($t_update['name'] . " - " . $t_update['version'])); ?>
                            </td>
                            <td class="lws_tk_td_tablenotif_list <?php echo $key === array_key_last($themes_update) ? esc_attr('lws_tk_td_is_last') : '' ?>">
                                <button class="lws_tk_general_button_notif" id="<?php echo esc_attr("lws_tk_update_theme_specific_" . $t_update['slug']) ?>" name="lws_tk_update_theme_specific" value="<?php echo(esc_attr($t_update['slug'])); ?>" onclick="lws_tk_updateTheme(this)">
                                    <span class="" name="update"><?php printf(esc_html__('Update to %s', 'lws-tools'), $t_update['new_version']) ?></span>
                                    <span class="hidden" name="loading">
                                        <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                        <span id="loading_1"><?php esc_html_e("Update in progress...", "lws-tools");?></span>
                                    </span>   
                                    <span class="hidden" name="validated">
                                        <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                                        <?php esc_html_e('Updated', 'lws-tools'); ?> &nbsp; 
                                    </span>
                                    
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </td>
                <?php else : ?>
                    <td class="lws_tk_td_tablenotif"> 
                    <span class="lws_tk_uptodate"><?php (esc_html_e('All your themes are up-to-date.', 'lws-tools')) ?></span>
                    </td>
                <?php endif ?>
            </tr>   
            
            <!-- Delete Plugins -->
            <tr class="lws_tk_tab_line">
                <?php if (count($unused_plugins)) : ?>
                <td class="lws_tk_td_tablenotif">
                    <span class="lws_tk_basic"><?php printf(esc_html__('You have %1$d unused plugin(s) out of %2$d.', 'lws-tools'), $inactive_plugins, $count_plugins) ?></span>
                    <td class="lws_tk_td_tablenotif">
                        <button class=" lws_tk_general_button_notif lws_tk_delete_button_notif" name="lws_tk_delete_all_plugins" onclick="lws_tk_deleteAllPlugin(this)">
                            <span class="" name="update"><?php esc_html_e('Delete all unused plugins', 'lws-tools') ?></span>
                            <span class="hidden" name="loading">
                                <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                <span id="loading_1"><?php esc_html_e("Deletion in progress...", "lws-tools");?></span>
                            </span>   
                            <span class="hidden" name="validated">
                                <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                                <?php esc_html_e('Deleted', 'lws-tools'); ?> &nbsp; 
                            </span>
                        </button>
                    </td>
                    <?php foreach ($unused_plugins as $key => $p_delete) : ?>
                        <tr>
                            <td class="lws_tk_td_tablenotif_list <?php echo $key === array_key_last($unused_plugins) ? esc_attr('lws_tk_td_is_last') : '' ?>">


                                <?php echo(esc_html($p_delete['name'] . " - " . $p_delete['version'])); ?>
                            </td>
                            <td class="lws_tk_td_tablenotif_list <?php echo $key === array_key_last($unused_plugins) ? esc_attr('lws_tk_td_is_last') : '' ?>">
                                <button class="lws_tk_general_button_notif lws_tk_delete_button_notif" id="<?php echo "lws_tk_delete_plugin_specific_" . $p_delete['slug'] ?>" name="lws_tk_delete_plugin_specific" value="<?php echo(esc_attr($p_delete['package'])); ?>" onclick="lws_tk_deletePlugin(this)">
                                    <span class="" name="update"><?php esc_html_e('Delete this plugin', 'lws-tools') ?></span>
                                    <span class="hidden" name="loading">
                                        <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                        <span id="loading_1"><?php esc_html_e("Deletion in progress...", "lws-tools");?></span>
                                    </span>   
                                    <span class="hidden" name="validated">
                                        <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                                        <?php esc_html_e('Deleted', 'lws-tools'); ?> &nbsp; 
                                    </span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </td>
                <?php else : ?>
                    <td class="lws_tk_td_tablenotif"> 
                    <span class="lws_tk_uptodate"><?php (esc_html_e('You have no unused plugins on your site.', 'lws-tools')) ?></span>
                    </td>
                <?php endif ?>
            </tr>
            
            <!-- Delete Themes -->
            <tr class="lws_tk_tab_line">
                <?php if (count($unused_themes)) : ?>
                    <td class="lws_tk_td_tablenotif">
                    <span class="lws_tk_basic"><?php printf(esc_html__('You have %1$d unused theme(s) out of %2$d.', 'lws-tools'), $count_inactive_themes, $count_themes) ?></span>
                    </td>
                    <td class="lws_tk_td_tablenotif">
                        <button class="lws_tk_general_button_notif lws_tk_delete_button_notif" name="lws_tk_delete_all_themes" onclick="lws_tk_deleteAllTheme(this)">
                            <span class="" name="update"><?php esc_html_e('Delete all unused themes', 'lws-tools') ?></span>
                            <span class="hidden" name="loading">
                                <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                <span id="loading_1"><?php esc_html_e("Deletion in progress...", "lws-tools");?></span>
                            </span>   
                            <span class="hidden" name="validated">
                                <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                                <?php esc_html_e('Deleted', 'lws-tools'); ?> &nbsp; 
                            </span>
                        </button>
                    </td>
                    <?php foreach ($unused_themes as $key => $t_delete) : ?>
                        <tr>
                            <td class="lws_tk_td_tablenotif_list <?php echo $key === array_key_last($unused_themes) ? esc_attr('lws_tk_td_is_last') : '' ?>">
                                <?php echo(esc_html($t_delete['name'] . " - " . $t_delete['version'])); ?>
                            </td>
                            <td class="lws_tk_td_tablenotif_list <?php echo $key === array_key_last($unused_themes) ? esc_attr('lws_tk_td_is_last') : '' ?>">
                                <button class="lws_tk_general_button_notif lws_tk_delete_button_notif" id="<?php echo esc_attr("lws_tk_delete_theme_specific_" . $t_delete['slug']) ?>" name="lws_tk_delete_theme_specific" value="<?php echo(esc_attr($t_delete['slug'])); ?>" onclick="lws_tk_deleteTheme(this)">
                                    <span class="" name="update"><?php esc_html_e('Delete this theme', 'lws-tools') ?></span>
                                    <span class="hidden" name="loading">
                                        <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                        <span id="loading_1"><?php esc_html_e("Deletion in progress...", "lws-tools");?></span>
                                    </span>   
                                    <span class="hidden" name="validated">
                                        <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                                        <?php esc_html_e('Deleted', 'lws-tools'); ?> &nbsp; 
                                    </span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <td class="lws_tk_td_tablenotif">
                    <span class="lws_tk_uptodate"><?php (esc_html_e('You have no unused themes on your site.', 'lws-tools')) ?></span>
                    </td>
                <?php endif ?>
            </tr>
            
            <!-- Update Translations -->
            <tr class="lws_tk_tab_line">
                <?php if ($translations_ready) : ?>
                    <td class="lws_tk_td_tablenotif">
                    <span class="lws_tk_basic"><?php esc_html_e('You have new translations waiting to be updated', 'lws-tools') ?></span>
                    </td>
                    <td class="lws_tk_td_tablenotif">
                        <button class="lws_tk_general_button_notif" name="lws_tk_update_trad" onclick="lws_tk_updateTrads(this)">
                            <span class="" name="update"><?php esc_html_e('Update translations', 'lws-tools') ?></span>
                                <span class="hidden" name="loading">
                                    <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                    <span id="loading_1"><?php esc_html_e("Update in progress...", "lws-tools");?></span>
                                </span>   
                                <span class="hidden" name="validated">
                                    <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                                    <?php esc_html_e('Updated', 'lws-tools'); ?> &nbsp; 
                            </span>
                        </button>
                    </td>
                <?php else : ?>
                    <td class="lws_tk_td_tablenotif">
                    <span class="lws_tk_uptodate"><?php esc_html_e('All your translations are up-to-date!', 'lws-tools') ?></span>
                    </td>
                <?php endif ?>
            </tr>
            
            <!-- DB Prefix TODO -->
            <tr>
                <?php if ($db_prefix) : ?>
                    <td class="lws_tk_td_tablenotif_list">
                        <?php esc_html_e('You are using the default database prefix.', 'lws-tools') ?>
                    </td>
                    <td class="lws_tk_td_tablenotif_list">
                        <form method="POST">
                            <button type="submit" class="lws_tk_general_button_notif" name="lws_tk_update_prefix" onclick="lws_tk_changePrefix(this)">                                
                                <span class="" name="update"><?php esc_html_e('Modify prefix', 'lws-tools') ?></span>
                                <span class="hidden" name="loading">
                                    <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                                    <span id="loading_1"><?php esc_html_e("Update in progress...", "lws-tools");?></span>
                                </span>  
                            </button>
                        </form>
                    </td>
                <?php else : ?>
                    <td class="lws_tk_td_tablenotif_list">
                        <?php esc_html_e('You are using a custom database prefix!', 'lws-tools') ?>
                    </td>
                <?php endif ?>
            </tr>
            
            <!-- SSL -->
            <tr>
                <?php if ($cert_invalid) : ?>
                    <td class="lws_tk_td_tablenotif_list">
                        <?php printf(esc_html__('Your SSL certificate has expired since %s. Your connexion is not secure. ', 'lws-tools'), $expiration_ssl); ?>
                    </td>
                <?php else : ?>
                    <td class="lws_tk_td_tablenotif_list">
                        <?php printf(esc_html__('SSL Certificate valid until %s - by %s', 'lws-tools'), $expiration_ssl, $issued_by); ?>
                    </td>
                <?php endif ?>
            </tr>

        </tbody>
    </table>
</div>

<script>
    function lws_tk_updateAllPlugin(button){
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button');
        button.setAttribute('disabled', true);
        jQuery("button[name^='lws_tk_update_plugin_specific']").prop('disabled', true);
        var data = {
            action: "lwstools_updateAllPlugin",
		};
        jQuery.post(ajaxurl, data, function(response) {
            var button = jQuery("button[name^='lws_tk_update_all_plugins'");
            button.children()[0].classList.add('hidden');
            button.children()[1].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.addClass('lws_tk_validated_button');
            var childButton = jQuery("button[name^='lws_tk_update_plugin_specific']");
            childButton.each(function(i){
                this.classList.add('lws_tk_validated_button');
                this.children[0].classList.add('hidden');
                this.children[2].classList.remove('hidden');
            });
        });
    }

    function lws_tk_updatePlugin(button){
        var button_id = button.id;
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button');
        button.setAttribute('disabled', true);
        var data = {
            action: "lwstools_updatePlugin",
            lws_tk_update_plugin_specific : button.value,
		};
        jQuery.post(ajaxurl, data, function(response) {
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button');
            //location.reload();
        });
    }
    
    function lws_tk_updateAllTheme(button){
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button');
        button.setAttribute('disabled', true);
        jQuery("button[name^='lws_tk_update_theme_specific']").prop('disabled', true);
        var data = {
            action: "lwstools_updateAllTheme",
		};
        jQuery.post(ajaxurl, data, function(response) {
            var button = jQuery("button[name^='lws_tk_update_all_themes'");
            button.children()[0].classList.add('hidden');
            button.children()[1].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.addClass('lws_tk_validated_button');
            var childButton = jQuery("button[name^='lws_tk_update_themes_specific']");
            childButton.each(function(i){
                this.classList.add('lws_tk_validated_button');
                this.children[0].classList.add('hidden');
                this.children[2].classList.remove('hidden');
            });
        });
    }

    function lws_tk_updateTheme(button){
        var button_id = button.id;
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button');
        button.setAttribute('disabled', true);
        var data = {
            action: "lwstools_updateTheme",
            lws_tk_update_theme_specific : button.value,
		};
        jQuery.post(ajaxurl, data, function(response) {
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button');
            //location.reload();
        });
    }
    
    function lws_tk_deleteAllPlugin(button){
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button');
        button.setAttribute('disabled', true);
        jQuery("button[name^='lws_tk_delete_plugin_specific']").prop('disabled', true);
        var data = {
            action: "lwstools_deleteAllPlugin",
		};
        jQuery.post(ajaxurl, data, function(response) {
            var button = jQuery("button[name^='lws_tk_delete_all_plugins'");
            button.children()[0].classList.add('hidden');
            button.children()[1].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.addClass('lws_tk_validated_button');
            var childButton = jQuery("button[name^='lws_tk_delete_plugin_specific']");
            childButton.each(function(i){
                this.classList.add('lws_tk_validated_button');
                this.children[0].classList.add('hidden');
                this.children[2].classList.remove('hidden');
            });

        });
    }

    function lws_tk_deletePlugin(button){
        var button_id = button.id;
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button');
        button.setAttribute('disabled', true);
        var data = {
            action: "lwstools_deletePlugin",
            lws_tk_delete_plugin_specific : button.value,
		};
        jQuery.post(ajaxurl, data, function(response) {
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button');
        });
    }
    
    function lws_tk_deleteAllTheme(button){
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button');
        button.setAttribute('disabled', true);
        jQuery("button[name^='lws_tk_delete_theme_specific']").prop('disabled', true);
        var data = {
            action: "lwstools_deleteAllTheme",
		};
        jQuery.post(ajaxurl, data, function(response) {
            var button = jQuery("button[name^='lws_tk_delete_all_themes'");
            button.children()[0].classList.add('hidden');
            button.children()[1].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.addClass('lws_tk_validated_button');
            var childButton = jQuery("button[name^='lws_tk_delete_theme_specific']");
            childButton.each(function(i){
                this.classList.add('lws_tk_validated_button');
                this.children[0].classList.add('hidden');
                this.children[2].classList.remove('hidden');
            });

        });
    }

    function lws_tk_deleteTheme(button){
        var button_id = button.id;
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button');
        button.setAttribute('disabled', true);
        var data = {
            action: "lwstools_deleteTheme",
            lws_tk_delete_theme_specific : button.value,
		};
        jQuery.post(ajaxurl, data, function(response) {
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button');
        });
    }
    
    function lws_tk_updateTrads(button){
        var button_id = button.id;
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button');
        var data = {
            action: "lwstools_updateTrads",
		};
        jQuery.post(ajaxurl, data, function(response) {
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button');
        });
    }

    function lws_tk_updateWP(button){
        button.children[0].classList.add('hidden');
        button.children[1].classList.remove('hidden');
    }

    function lws_tk_changePrefix(button){
        button.children[0].classList.add('hidden');
        button.children[1].classList.remove('hidden');
    }
</script>
