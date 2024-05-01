<div class="lws_tk_configpage">
    
    <?php printf(esc_html__('You have %d tables for a total size of %s.', 'lws-tools'), $table_number, $db_size); ?>
    <table class="lws_tk_mysqltable">
        <thead class="lws_tk_tab_line_mysql">
            <td class="lws_tk_tdmysql"><?php esc_html_e('Name', 'lws-tools'); ?></td>
            <td class="lws_tk_tdmysql"><?php esc_html_e('Size', 'lws-tools'); ?></td>
            <td class="lws_tk_tdmysql"><?php esc_html_e('Charset', 'lws-tools'); ?></td>
            <td class="lws_tk_tdmysql"><?php esc_html_e('Engine', 'lws-tools'); ?></td>
            <td class="lws_tk_tdmysql"><?php esc_html_e('Created', 'lws-tools'); ?></td>
        </thead>
        <tbody>
            <?php foreach ($list_tables as $table) : ?>
                <tr>
                    <td class="lws_tk_tdmysql">
                        <?php echo(esc_html($table['name'])); ?>
                    </td>
                    <td class="lws_tk_tdmysql">
                        <?php echo(esc_html($table['size'])); ?>
                    </td>
                    <td class="lws_tk_tdmysql">
                        <?php echo(esc_html($table['charset'])); ?>
                    </td>  
                    <td class="lws_tk_tdmysql">
                        <?php echo(esc_html($table['engine'])); ?>
                    </td>
                    <td class="lws_tk_tdmysql" style="padding-right:0px">
                        <?php echo(esc_html(explode( ' ', $table['created'])[0])); ?>
                    </td>                        
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
    <?php if (is_plugin_active('wps-bidouille/wps-bidouille.php')) : ?>
        <div class="error">
            <?php esc_html_e('You are using WPS Bidouille. Due to conflicts, you cannot use thoses functions while it is activated.', 'lws-tools'); ?>
        </div>
        <script>
            jQuery(document).ready(function(){
                jQuery('#lws_tk_repair').prop('disabled', true);
                jQuery('#lws_tk_repair').removeClass('lws_tk_general_install_button');
                jQuery('#lws_tk_repair').addClass('lws_tk_general_install_button_mysql');

                jQuery('#lws_tk_optimise').removeClass('lws_tk_general_install_button');
                jQuery('#lws_tk_optimise').addClass('lws_tk_general_install_button_mysql');
                jQuery('#lws_tk_optimise').prop('disabled', true);
            });
        </script>
    <?php endif ?>
    <div class="lws_tk_div_repair_sql">
        <?php $aff = array('strong' => array()); ?>
        <?php echo(wp_kses(__('If your database is not working properly, you may want to <strong>repair</strong> or <strong>optimise</strong> it.', 'lws-tools'), $aff)); ?>
        <button class="lws_tk_general_install_button lws_tk_mysql_repair" id="lws_tk_repair" onclick="">
            <span class="" name="update"><?php esc_html_e('Repair', 'lws-tools'); ?></span>
            <span class="hidden" name="loading">
                <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                <span id="loading_1"><?php esc_html_e("Repairing...", "lws-tools");?></span>
            </span> 
            <span class="hidden" name="validated">
                <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                <?php esc_html_e('Done', 'lws-tools'); ?> &nbsp; 
            </span>
        </button>
        
            <button class="lws_tk_general_install_button lws_tk_mysql_repair" id="lws_tk_optimise" onclick="">
                <span class="" name="update"><?php esc_html_e('Repair & Optimise', 'lws-tools'); ?></span>
                <span class="hidden" name="loading">
                    <img class="lws_tk_image_button" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/loading.gif')?>">
                    <span id="loading_1"><?php esc_html_e("Optimizing...", "lws-tools");?></span>
                </span> 
                <span class="hidden" name="validated">
                    <img class="lws_tk_image_button" width="18px" height="18px" src="<?php echo esc_url(plugin_dir_url( __DIR__ ) . 'images/check.svg')?>">
                    <?php esc_html_e('Done', 'lws-tools'); ?> &nbsp; 
                </span>
            </button>

        <button class="lws_tk_general_install_button hidden lws_tk_mysql_repair" id="lws_tk_close_iframe_button">
            <span class="" name="update"><?php esc_html_e('Close', 'lws-tools'); ?></span>
        </button>
    </div>

        <div class="lws_tk_iframe" id="result"></div>
</div>

<script>
    jQuery('#lws_tk_repair').on('click', function(){
        let button = this;
        let button_id = this.id;
        jQuery('#lws_tk_close_iframe_button').addClass('hidden');
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button_tools');
        button.setAttribute('disabled', true);
        jQuery('#result').html("");
        var data = {
            action: "lwstools_repairdb",
		};
        jQuery.post(ajaxurl, data, function(response) {
            jQuery('#result').html("<iframe width='100%' height='600px' sandbox src='" + response + "'></iframe>");
            var data = {
                action: "lwstools_deactivate_repair",
		    };
            jQuery.post(ajaxurl, data);
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button_tools');
            jQuery('#lws_tk_close_iframe_button').removeClass('hidden');
            button.prop('disabled', false);
        });
    });
    
    jQuery('#lws_tk_optimise').on('click', function(){
        let button = this;
        let button_id = this.id;
        jQuery('#lws_tk_close_iframe_button').addClass('hidden');
        button.children[0].classList.add('hidden');
        button.children[2].classList.add('hidden');
        button.children[1].classList.remove('hidden');
        button.classList.remove('lws_tk_validated_button_tools');
        button.setAttribute('disabled', true);
        jQuery('#result').html("");
        var data = {
            action: "lwstools_optidb",
		};
        jQuery.post(ajaxurl, data, function(response) {
            jQuery('#result').html("<iframe width='100%' height='600px' sandbox src='" + response + "'></iframe>");
            var data = {
                action: "lwstools_deactivate_repair",
		    };
            jQuery.post(ajaxurl, data);
            var button = jQuery('#' + button_id);
            button.children()[0].classList.add('hidden');
            button.children()[2].classList.remove('hidden');
            button.children()[1].classList.add('hidden');
            button.addClass('lws_tk_validated_button_tools');
            jQuery('#lws_tk_close_iframe_button').removeClass('hidden');
            button.prop('disabled', false);
        }); 
    });

    jQuery('#lws_tk_close_iframe_button').on('click', function(){
        jQuery('#result').html('');
        jQuery('#lws_tk_repair').children()[0].classList.remove('hidden');
        jQuery('#lws_tk_repair').children()[2].classList.add('hidden');

        jQuery('#lws_tk_optimise').children()[0].classList.remove('hidden');
        jQuery('#lws_tk_optimise').children()[2].classList.add('hidden');

        jQuery('#lws_tk_repair').removeClass('lws_tk_validated_button_tools');
        jQuery('#lws_tk_optimise').removeClass('lws_tk_validated_button_tools');
    });

</script>