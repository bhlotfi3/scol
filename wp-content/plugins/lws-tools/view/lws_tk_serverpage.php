<div class="lws_tk_configpage">
    <table>
        <tbody>
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Environment", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($_SERVER['SERVER_SOFTWARE'])); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Your IP", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($_SERVER['HTTP_X_REAL_IP'])); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Server Port", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($_SERVER['SERVER_PORT'])); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Is using HTTPS", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($is_https)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Server Name", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($_SERVER['SERVER_NAME'])); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Server IP", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($_SERVER['SERVER_ADDR'])); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Server Protocol", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($_SERVER['SERVER_PROTOCOL'])); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("PHP", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html(phpversion())); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Is in WP Debug", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($is_debug)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("allow_url_fopen", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($fopen)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Timezone", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($timezone)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Default Charset", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($charset)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Can upload files", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($can_file_upload)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Maximum execution time", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($max_exec_time . "s")); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Maximum amount of files per uploads", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($max_file_upload)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Maximum amount of characters per inputs", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($max_input_vars)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Memory Limit", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($memory_limit)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Max size of a post", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($post_max_size)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("Max size of uploaded files", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($upload_max_filesize)); ?>
                </td>
            </tr>
            
            <tr>
                <td class="lws_tk_tdserver">
                    <?php esc_html_e("PHP Memory Usage", "lws-tools"); ?>
                </td>
                <td>
                    <?php echo (esc_html($php_memory_usage)); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>