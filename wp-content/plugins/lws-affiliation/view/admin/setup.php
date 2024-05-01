<style>
    p{
        font-size:16px;
    }
    h2{
        font-size:18px;
    }
</style>
<?php $arr = array('i' => array(), 'a' => array('href' => array(), 'target' => array()));?>

<div class="config-bloc-aff">
    
    <div id="banner_lws_aff"></div>
    
    <?php if (is_plugin_active('better-wp-security/better-wp-security.php')) : ?>
        <div class="error ithemes">
            <?php esc_html_e("It seems you are using IThemes Security. Please allow \"PHP in extensions\" or deactivate this plugin for our plugin to work correctly.", 'lws-affiliation') ?>
        </div>
    <?php endif ?>
    
    <?php if (ini_get('allow_url_fopen')) : ?>
        <?php if (isset($configLWS['apikey'])) : ?>
            <p>
                <?php esc_html_e('Your plugin is configurated and ready to use', 'lws-affiliation') ?>. <br />
            </p>
        <?php endif ?>
            
            <h2><?php esc_html_e('What is LWS Affiliate?', 'lws-affiliation'); ?> </h2>
            <p>
                <?php esc_html_e('LWS Affiliate is a service from LWS, a renowned hosting company. This platform allows you to participate in our Affiliate Programm.', 'lws-affiliation') ?> <br />
            </p>
            
            <h2><?php esc_html_e('How to use LWS Affiliate?', 'lws-affiliation'); ?> </h2>
            <p>
                <?php esc_html_e("You can use it from your article or page editor", 'lws-affiliation') ?>.<br/>
                <ul style="list-style: disc inside;">
                    <li>
                        <?php esc_html_e("If you are using the classic WordPress editor, just click on the \"LWS Affiliation\" button on your editor's menu.", 'lws-affiliation') ?><br>
                    </li>
                    <li>
                        <?php esc_html_e("If you are using Gutenberg, the block-based editor, add a \"Classic Editor\" block to your page and click on the \"LWS Affiliation\" button on your editor's menu.", 'lws-affiliation') ?>
                    </li>
                </ul>
                
                <?php esc_html_e("You can only add one type of each widget on your page. Any attempts to add more will result in an error or in only one of them appearing.", 'lws-affiliation') ?> <br>
                <?php echo (wp_kses( __("For more information, visit our <a href='http://aide.lws.fr/base/Affiliation/Hebergeur-Web/Comment-installer-et-utiliser-le-plugin-Wordpress-Affiliation' target='_blank'>documentation</a>", 'lws-affiliation'), $arr))?>.<br />
            </p>
            
        <?php if (isset($configLWS['apikey'])) : ?>
            <h2><?php esc_html_e('Disconnection', 'lws-affiliation'); ?></h2>
            <p>
                <form method="POST">
                    <?php esc_html_e("If you want to connect your site to another account, click on this button:", 'lws-affiliation') ?> 
                    <button class="button_disconnect-aff" type="submit" name="del_config" >
                        <img src="<?php echo esc_url(plugins_url('/images/deconnexion.svg', dirname(__DIR__)))?>" alt="Logo Disconnect" width="15px" height="15px" style="margin: 1px;margin-top: 4px;"></img>
                        <span style="vertical-align:text-bottom; margin-left:10px; line-height:23px;"><?php esc_html_e("Log out", 'lws-affiliation');?></span>
                    </button>
                </form>
            </p>
        <?php else : ?>
            <h2><?php esc_html_e('Connection', 'lws-affiliation'); ?></h2>
            <p>
                <?php wp_kses( _e("Enter here your username and password LWS affiliate, this is the login information by which you reach the <a href='https://affiliation.lws-hosting.com' target='_blank'>affiliate panel LWS</a> LWS", 'lws-affiliation'), $arr) ?><br />
                <?php wp_kses( _e("If you do not have an affiliate LWS account, you can create one in a few minutes from the <a href='https://affiliation.lws-hosting.com/members/addmember' target='__blank' title='Sign LWS Affiliation'>registration page</a>", 'lws-affiliation'), $arr) ?>.
            </p>
            <form method="post">
                <div class="tagsdiv">
                    <input type="text" name="username-aff-lws" value="<?php if (isset($configLWS['username'])) : ?><?php echo esc_attr($configLWS['username']) ?><?php endif ?>" placeholder="<?php esc_attr( _e('Your affiliate ID', 'lws-affiliation')) ?>" class="newtag form-input-tip" />
                    <input type="password" name="password-aff-lws" value="<?php if (isset($configLWS['password'])) : ?><?php echo esc_attr($configLWS['password']) ?><?php endif ?>" placeholder="<?php esc_attr( _e('Your affiliate password', 'lws-affiliation')) ?>" class="newtag form-input-tip" />
                    <input type="submit" name="validate-config-aff-lws" id="publish" class="button button-primary" value="<?php esc_html_e('Submit', 'lws-affiliation') ?>" />
                </div>
            </form>
        <?php endif ?>
    <?php else : ?>
        <div class="error">
            <p>
                <?php echo (wp_kses( __("The plugin configuration is impossible because <i>allow_url_fopen</ i> is not active in your hosting", 'lws-affiliation'), $arr)) ?>.<br />
                <?php echo (wp_kses( __("If you are hosted with LWS, please consult this <a href='http://aide.lws.fr/base/Hebergement-web-mutualise/Programmation/Configurer-PHP' target='_blank'>documentation</ a>, otherwise, please contact your provider to enable this option", 'lws-affiliation'), $arr)) ?>.
            </p>
        </div>
    <?php endif ?>
</div>