<div class="bloc-title-affiliation">
    <img src="<?php echo esc_url(plugins_url('images/plugin_lws_affiliation_page.svg', dirname(__DIR__)))?>" alt="LWS Affiliation Logo" width="60px" height="60px" style="margin-top:10px">
    <h1 class="page-title-aff title_bloc-aff"><strong>LWS Affiliation</strong><br><span class="sub-title"><?php esc_html_e("Web Hosting LWS Affiliate Programm", "lws-affiliation")?></span></h1>
</div>

    
<?php if (isset($formError)) : ?>
    <div class="error_lws">
        <p><?php echo esc_html($formError) ?></p>
    </div>
<?php endif ?>

<?php if (isset($formSuccess)) : ?>
    <div class="updated_lws">
        <p><?php esc_html_e('Your information has been saved', 'lws-affiliation') ?>.</p>
    </div>
<?php endif ?>

<h2 class="nav-tab-wrapper nav-bloc">
    <a href="?page=lws-affiliation-settings&tab=welcome" class="nav-general nav-tab <?php echo $active_tab == 'welcome' ? esc_html('nav-tab-active') : ''; ?>"><?php esc_html_e("Welcome", "lws-affiliation");?></a>
        <?php if (isset($configLWS['apikey'])) : ?>
            <a href="?page=lws-affiliation-settings&tab=stats" class="nav-tab <?php echo $active_tab == 'stats' ? esc_html('nav-tab-active') : ''; ?>"><?php esc_html_e("Statistics", "lws-affiliation");?></a>
            <a href="?page=lws-affiliation-settings&tab=history" class="nav-tab <?php echo $active_tab == 'history' ? esc_html('nav-tab-active') : ''; ?>"><?php esc_html_e("Last sales", "lws-affiliation");?></a>
        <?php endif ?>
        
</h2>