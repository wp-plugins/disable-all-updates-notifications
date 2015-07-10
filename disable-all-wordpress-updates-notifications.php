<?php

/*
Plugin Name: Disable All Updates & Notifications
Description: Easy way to disables all wordpress, themes, plugins, core updates & notifications in wordpress.
Plugin URI:  http://wordpress.org/plugins/disable-all-wordpress-updates-notifications/
Version:     1.0
Author:      Chandrakesh Kumar
Author URI:  http://www.wpchandra.com/
License:	 GPL2
*/


//Desable Update Notification
add_action('after_setup_theme', 'remove_all_updates_and_notifications');

function remove_all_updates_and_notifications() {

	if (!current_user_can('update_core')) {
		return;
	}
	add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
	add_filter('pre_option_update_core', '__return_null');
	add_filter('pre_site_transient_update_core', '__return_null');
	add_filter( 'auto_update_translation', '__return_false' );
	add_filter( 'automatic_updater_disabled', '__return_true' );
	add_filter( 'allow_minor_auto_core_updates', '__return_false' );
	add_filter( 'allow_major_auto_core_updates', '__return_false' );
	add_filter( 'allow_dev_auto_core_updates', '__return_false' );
	add_filter( 'auto_update_core', '__return_false' );
	add_filter( 'wp_auto_update_core', '__return_false' );
	add_filter( 'auto_core_update_send_email', '__return_false' );
	add_filter( 'send_core_update_notification_email', '__return_false' );
	add_filter( 'auto_update_plugin', '__return_false' );
	add_filter( 'auto_update_theme', '__return_false' );
	add_filter( 'automatic_updates_send_debug_email', '__return_false' );
	add_filter( 'automatic_updates_is_vcs_checkout', '__return_true' );
	add_filter('pre_site_transient_update_plugins','__return_null');
	remove_action('load-update-core.php','wp_update_plugins');
	define( 'WP_AUTO_UPDATE_CORE', false );
	define( 'AUTOMATIC_UPDATER_DISABLED', true );

}


?>