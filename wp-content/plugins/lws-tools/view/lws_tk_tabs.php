<div class="lws-tk-titlebloc">
    <img src="<?php echo esc_url(plugins_url('images/plugin_lws_tools_logo.svg', __DIR__))?>" alt="LWS tools Logo" width="60px" height="60px">
    <h1 class="lws-tk-maintitle">
        <strong>LWS Tools</strong>
        <br>
        <span class="lws-tk-subtitle"><?php esc_html_e("A set of tools and shortcuts to manage your WordPress website", "lws-tools")?></span>
    </h1>
</div>

<h2 class=" lws_tk-nav-list nav-tab-wrapper">
    <a href="?page=lws-tk-config&tab=notification" class="lws_tk-tab lws_tk-tab-general nav-tab <?php echo $active_tab == 'notification' ? esc_attr('nav-tab-active') : ''; ?>"><?php esc_html_e("Notifications Center", "lws-tools");?></a>
    <a href="?page=lws-tk-config&tab=server" class="lws_tk-tab nav-tab <?php echo $active_tab == 'server' ? esc_attr('nav-tab-active') : ''; ?>"><?php esc_html_e("Server Informations", "lws-tools");?></a>
    <a href="?page=lws-tk-config&tab=optimisation" class="lws_tk-tab nav-tab <?php echo $active_tab == 'optimisation' ? esc_attr('nav-tab-active') : ''; ?>"><?php esc_html_e("Optimisations", "lws-tools");?></a>
    <a href="?page=lws-tk-config&tab=mysql" class="lws_tk-tab nav-tab <?php echo $active_tab == 'mysql' ? esc_attr('nav-tab-active') : ''; ?>"><?php esc_html_e("MySQL Reports", "lws-tools");?></a>
    <a href="?page=lws-tk-config&tab=tools" class="lws_tk-tab nav-tab <?php echo $active_tab == 'tools' ? esc_attr('nav-tab-active') : ''; ?>"><?php esc_html_e("Complementary Tools", "lws-tools");?></a>
    <a href="?page=lws-tk-config&tab=ourplugins" class="lws_tk-tab nav-tab <?php echo $active_tab == 'ourplugins' ? esc_attr('nav-tab-active') : ''; ?>"><?php esc_html_e("Our plugins", "lws-tools");?></a>

</h2>
