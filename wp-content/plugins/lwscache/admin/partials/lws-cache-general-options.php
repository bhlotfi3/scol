<?php
/**
 * Display general options of the plugin.
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      2.0.0
 *
 * @package    LWSCache
 * @subpackage LWSCache/admin/partials
 */

global $lws_cache_admin;

$error_log_filesize = false;

$args = array(
	'enable_purge'                     => FILTER_SANITIZE_STRING,
	'enable_stamp'                     => FILTER_SANITIZE_STRING,
	'purge_method'                     => FILTER_SANITIZE_STRING,
	'is_submit'                        => FILTER_SANITIZE_STRING,
	'redis_hostname'                   => FILTER_SANITIZE_STRING,
	'redis_port'                       => FILTER_SANITIZE_STRING,
	'redis_prefix'                     => FILTER_SANITIZE_STRING,
	'purge_homepage_on_edit'           => FILTER_SANITIZE_STRING,
	'purge_homepage_on_del'            => FILTER_SANITIZE_STRING,
	'purge_url'                        => FILTER_SANITIZE_STRING,
	'log_level'                        => FILTER_SANITIZE_STRING,
	'log_filesize'                     => FILTER_SANITIZE_STRING,
	'smart_http_expire_save'           => FILTER_SANITIZE_STRING,
	'cache_method'                     => FILTER_SANITIZE_STRING,
	'enable_map'                       => FILTER_SANITIZE_STRING,
	'enable_log'                       => FILTER_SANITIZE_STRING,
	'purge_archive_on_edit'            => FILTER_SANITIZE_STRING,
	'purge_archive_on_del'             => FILTER_SANITIZE_STRING,
	'purge_archive_on_new_comment'     => FILTER_SANITIZE_STRING,
	'purge_archive_on_deleted_comment' => FILTER_SANITIZE_STRING,
	'purge_page_on_mod'                => FILTER_SANITIZE_STRING,
	'purge_page_on_new_comment'        => FILTER_SANITIZE_STRING,
	'purge_page_on_deleted_comment'    => FILTER_SANITIZE_STRING,
	'smart_http_expire_form_nonce'     => FILTER_SANITIZE_STRING,
);

$all_inputs = filter_input_array( INPUT_POST, $args );

if ( isset( $all_inputs['smart_http_expire_save'] ) && wp_verify_nonce( $all_inputs['smart_http_expire_form_nonce'], 'smart-http-expire-form-nonce' ) ) {
	unset( $all_inputs['smart_http_expire_save'] );
	unset( $all_inputs['is_submit'] );

	$nginx_settings = wp_parse_args(
		$all_inputs,
		$lws_cache_admin->lws_cache_default_settings()
	);

	if ( ( ! is_numeric( $nginx_settings['log_filesize'] ) ) || ( empty( $nginx_settings['log_filesize'] ) ) ) {
		$error_log_filesize = __( 'Log file size must be a number.', 'LWSCache' );
		unset( $nginx_settings['log_filesize'] );
	}

	if ( $nginx_settings['enable_map'] ) {
		$lws_cache_admin->update_map();
	}

	update_site_option( 'rt_wp_lws_cache_options', $nginx_settings );

	echo '<div class="updated"><p>' . esc_html__( 'Settings saved.', 'LWSCache' ) . '</p></div>';

}

$lws_cache_settings = $lws_cache_admin->lws_cache_settings();
$log_path           = $lws_cache_admin->functional_asset_path();
$log_url            = $lws_cache_admin->functional_asset_url();

/**
 * Get setting url for single multiple with subdomain OR multiple with subdirectory site.
 */
$nginx_setting_link = '#';
if ( is_multisite() ) {
	if ( SUBDOMAIN_INSTALL === false ) {
		$nginx_setting_link = 'https://easyengine.io/wordpress-nginx/tutorials/multisite/subdirectories/fastcgi-cache-with-purging/';
	} else {
		$nginx_setting_link = 'https://easyengine.io/wordpress-nginx/tutorials/multisite/subdomains/fastcgi-cache-with-purging/';
	}
} else {
	$nginx_setting_link = 'https://easyengine.io/wordpress-nginx/tutorials/single-site/fastcgi-cache-with-purging/';
}
?>

<!-- On test si le plugin est compatible avec le domaine -->
<?php if(!$_SERVER['lwscache']) : ?>

	<style>.notif_cache:before{background: #f24235; position: absolute; content: ''; left: 0; top: 0; width: 45px; height: 100%; background-image: url(/wp-content/plugins/lwscache/admin/icons/erreur_info.svg) !important; image-rendering: pixelated; background-repeat: no-repeat; background-position: 50%; background-size: 20px 20px; display: block; border-radius: 0; -webkit-transform: translate3d(0,0,0);}</style>
	<div class="notif_cache" style="font-size: 14px; width: max-content; max-width: 900px; padding: 10px; color: #97170e; background: #f5d7d7; border: 1px solid #f24235; position: relative; padding-left: 60px; -webkit-transform: translate3d(0,0,0);"><?php esc_html_e( 'Your site is not compatible with this plugin.', 'LWSCache' ); ?></div>

<?php else : ?>

<!-- On test si le cache nginx a bien été activé sur le panel Client -->
<!-- Si pas activé on affiche un message rouge -->
<?php if($_SERVER['lwscache'] != 'On') : ?>

	<style>.notif_cache:before{background: #f24235; position: absolute; content: ''; left: 0; top: 0; width: 45px; height: 100%; background-image: url(/wp-content/plugins/lwscache/admin/icons/erreur_info.svg) !important; image-rendering: pixelated; background-repeat: no-repeat; background-position: 50%; background-size: 20px 20px; display: block; border-radius: 0; -webkit-transform: translate3d(0,0,0);} .notif_cache p{font-size: 14px;}</style>
	<div class="notif_cache" style="width: max-content; max-width: 900px; padding: 10px; color: #97170e; background: #f5d7d7; border: 1px solid #f24235; position: relative; padding-left: 60px; -webkit-transform: translate3d(0,0,0);">
		<p><?php esc_html_e( 'The plugin cannot currently work with your service because LWSCache caching has not been enabled in your client panel.', 'LWSCache' ); ?></p>
		<p><?php esc_html_e( 'We invite you to activate this feature by logging into your LWS account and following', 'LWSCache' ); ?> <a href='https://aide.lws.fr/a/1573' target='_blank'><?php esc_html_e( 'this documentation', 'LWSCache' ); ?></a>.</p>
		<p><?php esc_html_e( 'After the activation, it will be taken into consideration for a maximum of 15 minutes.', 'LWSCache' ); ?></p>
	</div>

<?php else : ?>

	<!-- Forms containing LWSCache settings options. -->
	<form id="post_form" method="post" action="#" name="smart_http_expire_form" class="clearfix">
	
		<div class="postbox">
			<h3 class="hndle">
				<span><?php esc_html_e( 'Plugin description', 'LWSCache' ); ?></span>
			</h3>
			<div class="inside">
				<p><?php esc_html_e( 'This plugin allows you to automatically manage the purging of cache files generated by LWSCache located on the web server. It is possible to configure the automatic purge when you modify your pages, articles, posts ...', 'LWSCache' ); ?></p>
				<p><?php esc_html_e( 'The cache generated by LWSCache allows you to load more quickly a part of your code (html, css, js, images, ...) in order to optimize the speed of your pages. The improvement of the display speed is a very important factor for a good referencing with search engines.', 'LWSCache' ); ?></p>
				<a href='https://aide.lws.fr/a/1579' target='_blank'><?php esc_html_e( 'En savoir plus' ); ?></a>
			</div>
		</div>

		<div class="postbox">
			<h3 class="hndle">
				<span><?php esc_html_e( 'Purging Options', 'LWSCache' ); ?></span>
			</h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<td>
							<input type="checkbox" value="1" id="enable_purge" name="enable_purge" <?php checked( $lws_cache_settings['enable_purge'], 1 ); ?> />
							<label for="enable_purge"><?php esc_html_e( 'Enable Automatic Purge', 'LWSCache' ); ?></label>
						</td>
					</tr>
				</table>
			</div> <!-- End of .inside -->
		</div>

		<?php if ( ! ( ! is_network_admin() && is_multisite() ) ) { ?>
			<div class="postbox enable_purge"<?php echo ( empty( $lws_cache_settings['enable_purge'] ) ) ? ' style="display: none;"' : ''; ?>>
				<h3 class="hndle">
					<span><?php esc_html_e( 'Automatic Purging Condition', 'LWSCache' ); ?></span>
				</h3>
				<div class="inside">
					<table class="form-table rtnginx-table">
						<tr valign="top">
							<th scope="row"><h4><?php esc_html_e( 'Purge Homepage:', 'LWSCache' ); ?></h4></th>
							<td>
								<fieldset>
									<legend class="screen-reader-text">
										<span>
											&nbsp;
											<?php
												esc_html_e( 'when a post/page/custom post is modified or added.', 'LWSCache' );
											?>
										</span>
									</legend>
									<label for="purge_homepage_on_edit">
										<input type="checkbox" value="1" id="purge_homepage_on_edit" name="purge_homepage_on_edit" <?php checked( $lws_cache_settings['purge_homepage_on_edit'], 1 ); ?> />
										&nbsp;
										<?php
											echo wp_kses(
												__( 'when a <strong>post</strong> (or page/custom post) is <strong>modified</strong> or <strong>added</strong>.', 'LWSCache' ),
												array( 'strong' => array() )
											);
										?>
										&nbsp;
										<span style="color: red">
											<?php
												esc_html_e( '(recommended)', 'LWSCache' );
											?>
										</span>
									</label>
									<br />
								</fieldset>
								<fieldset>
									<legend class="screen-reader-text">
										<span>
											&nbsp;
											<?php
												esc_html_e( 'when an existing post/page/custom post is modified.', 'LWSCache' );
											?>
										</span>
									</legend>
									<label for="purge_homepage_on_del">
										<input type="checkbox" value="1" id="purge_homepage_on_del" name="purge_homepage_on_del" <?php checked( $lws_cache_settings['purge_homepage_on_del'], 1 ); ?> />
										&nbsp;
										<?php
											echo wp_kses(
												__( 'when a <strong>published post</strong> (or page/custom post) is <strong>trashed</strong>', 'LWSCache' ),
												array( 'strong' => array() )
											);
										?>
										&nbsp;
										<span style="color: red">
											<?php
												esc_html_e( '(recommended)', 'LWSCache' );
											?>
										</span>
									</label>
									<br />
								</fieldset>
							</td>
						</tr>
					</table>
					<table class="form-table rtnginx-table">
						<tr valign="top">
							<th scope="row">
								<h4>
									<?php esc_html_e( 'Purge Post/Page/Custom Post Type:', 'LWSCache' ); ?>
								</h4>
							</th>
							<td>
								<fieldset>
									<legend class="screen-reader-text">
										<span>&nbsp;
											<?php
												esc_html_e( 'when a post/page/custom post is published.', 'LWSCache' );
											?>
										</span>
									</legend>
									<label for="purge_page_on_mod">
										<input type="checkbox" value="1" id="purge_page_on_mod" name="purge_page_on_mod" <?php checked( $lws_cache_settings['purge_page_on_mod'], 1 ); ?>>
										&nbsp;
										<?php
											echo wp_kses(
												__( 'when a <strong>post</strong> is <strong>published</strong>.', 'LWSCache' ),
												array( 'strong' => array() )
											);
										?>
										&nbsp;
										<span style="color: red">
											<?php
												esc_html_e( '(recommended)', 'LWSCache' );
											?>
										</span>
									</label>
									<br />
								</fieldset>
								<fieldset>
									<legend class="screen-reader-text">
										<span>
											&nbsp;
											<?php
												esc_html_e( 'when a comment is approved/published.', 'LWSCache' );
											?>
										</span>
									</legend>
									<label for="purge_page_on_new_comment">
										<input type="checkbox" value="1" id="purge_page_on_new_comment" name="purge_page_on_new_comment" <?php checked( $lws_cache_settings['purge_page_on_new_comment'], 1 ); ?>>
										&nbsp;
										<?php
											echo wp_kses(
												__( 'when a <strong>comment</strong> is <strong>approved/published</strong>.', 'LWSCache' ),
												array( 'strong' => array() )
											);
										?>
										&nbsp;
										<span style="color: red">
											<?php
												esc_html_e( '(recommended)', 'LWSCache' );
											?>
										</span>
									</label>
									<br />
								</fieldset>
								<fieldset>
									<legend class="screen-reader-text">
										<span>
											&nbsp;
											<?php
												esc_html_e( 'when a comment is unapproved/deleted.', 'LWSCache' );
											?>
										</span>
									</legend>
									<label for="purge_page_on_deleted_comment">
										<input type="checkbox" value="1" id="purge_page_on_deleted_comment" name="purge_page_on_deleted_comment" <?php checked( $lws_cache_settings['purge_page_on_deleted_comment'], 1 ); ?>>
										&nbsp;
										<?php
											echo wp_kses(
												__( 'when a <strong>comment</strong> is <strong>unapproved/deleted</strong>.', 'LWSCache' ),
												array( 'strong' => array() )
											);
										?>
										&nbsp;
										<span style="color: red">
											<?php
												esc_html_e( '(recommended)', 'LWSCache' );
											?>
										</span>
									</label>
									<br />
								</fieldset>
							</td>
						</tr>
					</table>
					<table class="form-table rtnginx-table">
						<tr valign="top">
							<th scope="row">
								<h4>
									<?php esc_html_e( 'Purge Archives:', 'LWSCache' ); ?>
								</h4>
								<small><?php esc_html_e( '(date, category, tag, author, custom taxonomies)', 'LWSCache' ); ?></small>
							</th>
							<td>
								<fieldset>
									<legend class="screen-reader-text">
										<span>
											&nbsp;
											<?php
												esc_html_e( 'when an post/page/custom post is modified or added', 'LWSCache' );
											?>
										</span>
									</legend>
									<label for="purge_archive_on_edit">
										<input type="checkbox" value="1" id="purge_archive_on_edit" name="purge_archive_on_edit" <?php checked( $lws_cache_settings['purge_archive_on_edit'], 1 ); ?> />
										&nbsp;
										<?php
											echo wp_kses(
												__( 'when a <strong>post</strong> (or page/custom post) is <strong>modified</strong> or <strong>added</strong>.', 'LWSCache' ),
												array( 'strong' => array() )
											);
										?>
										&nbsp;
										<span style="color: red">
											<?php
												esc_html_e( '(recommended)', 'LWSCache' );
											?>
										</span>
									</label>
									<br />
								</fieldset>
								<fieldset>
									<legend class="screen-reader-text">
										<span>
											&nbsp;
											<?php
												esc_html_e( 'when an existing post/page/custom post is trashed.', 'LWSCache' );
											?>
										</span>
									</legend>
									<label for="purge_archive_on_del">
										<input type="checkbox" value="1" id="purge_archive_on_del" name="purge_archive_on_del"<?php checked( $lws_cache_settings['purge_archive_on_del'], 1 ); ?> />
										&nbsp;
										<?php
											echo wp_kses(
												__( 'when a <strong>published post</strong> (or page/custom post) is <strong>trashed</strong>.', 'LWSCache' ),
												array( 'strong' => array() )
											);
										?>
									</label>
									&nbsp;
										<span style="color: red">
											<?php
												esc_html_e( '(recommended)', 'LWSCache' );
											?>
										</span>
									<br />
								</fieldset>
								<br />
								<fieldset>
									<legend class="screen-reader-text">
										<span>
											&nbsp;
											<?php
												esc_html_e( 'when a comment is approved/published.', 'LWSCache' );
											?>
										</span>
									</legend>
									<label for="purge_archive_on_new_comment">
										<input type="checkbox" value="1" id="purge_archive_on_new_comment" name="purge_archive_on_new_comment" <?php checked( $lws_cache_settings['purge_archive_on_new_comment'], 1 ); ?> />
										&nbsp;
										<?php
											echo wp_kses(
												__( 'when a <strong>comment</strong> is <strong>approved/published</strong>.', 'LWSCache' ),
												array( 'strong' => array() )
											);
										?>
									</label>
									<br />
								</fieldset>
								<fieldset>
									<legend class="screen-reader-text">
										<span>
											&nbsp;
											<?php
												esc_html_e( 'when a comment is unapproved/deleted.', 'LWSCache' );
											?>
										</span>
									</legend>
									<label for="purge_archive_on_deleted_comment">
										<input type="checkbox" value="1" id="purge_archive_on_deleted_comment" name="purge_archive_on_deleted_comment" <?php checked( $lws_cache_settings['purge_archive_on_deleted_comment'], 1 ); ?> />
										&nbsp;
										<?php
											echo wp_kses(
												__( 'when a <strong>comment</strong> is <strong>unapproved/deleted</strong>.', 'LWSCache' ),
												array( 'strong' => array() )
											);
										?>
									</label>
									<br />
								</fieldset>
							</td>
						</tr>
					</table>

				</div> <!-- End of .inside -->
			</div>

			<input type="hidden" value="1" id="enable_log" name="enable_log" />
			<?php
		} // End of if.

		?>

		<input type="hidden" name="smart_http_expire_form_nonce" value="<?php echo wp_create_nonce('smart-http-expire-form-nonce'); ?>"/>

		<div style="float: left;">
			<?php
				submit_button( __( 'Save All Changes', 'LWSCache' ), 'primary large', 'smart_http_expire_save', true );
			?>
		</div>
		
	<?php
	$purge_url  = add_query_arg(
		array(
			'lws_cache_action' => 'purge',
			'lws_cache_urls'   => 'all',
		)
	);
	$nonced_url = wp_nonce_url( $purge_url, 'lws_cache-purge_all' );
	?>

		<div style="float: right;">
			<p class="submit">
				<a href="<?php echo esc_url( $nonced_url ); ?>" class="button-primary" style="background: red; border-color: red;"><?php esc_html_e( 'Purge Entire Cache', 'LWSCache' ); ?></a>
			</p>
		</div>
		<br style="clear: both;" />
	</form><!-- End of #post_form -->

<?php endif ?>

<?php endif ?>