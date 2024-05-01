<div class="lws_tk_configpage">
        
        <form method="POST">
            <?php foreach ($optimisation_list as $key => $opti) : ?>
            <div class="lws_tk_optipage_table">
                <input type="checkbox" id="<?php echo esc_attr($key); ?>" name="lws_tk_optimisation_list[]" value="<?php echo esc_attr($key); ?>" <?php echo get_option('lws_tk_' . $key) ? esc_attr('checked') : '';?>>
                <label for="<?php echo esc_attr($key); ?>"><?php echo esc_html($opti); ?></label>
                <?php if ($key === 'less_revision') : ?>
                <input style="width:120px" name="<?php echo esc_attr($key . "_revision_number"); ?>" type="number" min="1" value="<?php echo get_option('lws_tk_reduce_revisions_number') ? esc_attr((int)get_option('lws_tk_reduce_revisions_number')) : 1; ?>">
                <?php endif ?>
            </div>
            <?php endforeach ?>
            <input type="submit" class="lws_tk_general_install_button" style="margin-top: 9px;" name="lws_tk_optimisations" id="lws_tk_optimisations" value="<?php esc_html_e('Apply optimisations', 'lws-tools'); ?>">
        </form>
    
