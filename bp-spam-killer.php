<?php
/*** Make sure BuddyPress is loaded ********************************/
if ( !function_exists( 'bp_core_install' ) ) {
	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'buddypress/bp-loader.php' ) ) {
		require_once ( WP_PLUGIN_DIR . '/buddypress/bp-loader.php' );
	} else {
		add_action( 'admin_notices', 'bp_spam_killer_install_buddypress_notice' );
		return;
	}
}


function bp_spam_killer_install_buddypress_notice() {
	echo '<div id="message" class="error fade"><p style="line-height: 150%">';
	_e('<strong>BP Spam Killer</strong></a> requires the BuddyPress plugin to work. Please <a href="http://buddypress.org/download">install BuddyPress</a> first, or <a href="plugins.php">deactivate BP Spam Killer</a>.');
	echo '</p></div>';
}

function add_honeypot() {
	echo '';
}
	
function check_honeypot() {
	if (!empty($_POST['system55'])) {
			global $bp;
			wp_redirect(home_url().'/spam-prevention');
			exit;
	}
}

add_action('bp_after_signup_profile_fields','add_honeypot');
add_filter('bp_core_validate_user_signup', 'check_honeypot');
?>