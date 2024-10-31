<?php

/**
 * 
 * This file runs when the plugin in uninstalled (deleted).
 * This will not run when the plugin is deactivated.
 * Ideally you will add all your clean-up scripts here
 * that will clean-up unused meta, options, etc. in the database.
 * 
 */

// If plugin is not being uninstalled, exit (do nothing)
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
	global $wpdb;
    $table_name = $wpdb->prefix . 'postcodes';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);

	$table_name = $wpdb->prefix . 'settings';
	$sql = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql);

// Do something here if plugin is being uninstalled.
