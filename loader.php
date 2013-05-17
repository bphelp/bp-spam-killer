<?php 
/*
Plugin Name: BP Spam Killer
Plugin URI: http://www.wordpress.com
Description: Helps to prevent SPAM 
No settings just activate it to help prevent spam registrations
Version: 1.0
Requires at least: WordPress 3.2 / BuddyPress 1.5
Tested up to: WordPress 3.5.1 / BuddyPress 1.7.1
License: GNU/GPL 2
Author: @bphelp 
Author URI: http://www.wordpress.com
*/

function bp_spam_killer_init() {
	require( dirname( __FILE__ ) . '/bp-spam-killer.php' );
}
add_action( 'bp_include', 'bp_spam_killer_init' );
?>