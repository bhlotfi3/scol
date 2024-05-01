<div class="lws-hl-titlebloc">
    <img src="<?php echo esc_url(plugins_url('images/plugin_lws_hide_login_page.svg', __DIR__))?>" alt="LWS Hide Login Logo" width="60px" height="60px">
    <h1 class="lws-hl-maintitle">
        <strong>LWS Hide Login</strong>
        <br>
        <span class="lws-hl-subtitle"><?php esc_html_e("Security of your website, our priority", "lws-hide-login")?></span>
    </h1>
</div>

<h2 class=" lws_ht-nav-list nav-tab-wrapper">
    <a href="?page=lws-ht-config-network&tab=general" class="lws_ht-tab lws_ht-tab-general nav-tab <?php echo $active_tab == 'general' ? esc_html('nav-tab-active') : ''; ?>"><?php esc_html_e("General", "lws-hide-login");?></a>
    <a href="?page=lws-ht-config-network&tab=ourplugins" class="lws_ht-tab nav-tab <?php echo $active_tab == 'ourplugins' ? esc_html('nav-tab-active') : ''; ?>"><?php esc_html_e("Our plugins", "lws-hide-login");?></a>
</h2>