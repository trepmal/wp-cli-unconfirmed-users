<?php
/**
 * Plugin Name: Unconfirmed Users CLI
 * Description: List and activate unconfirmed users
 */

if ( ! defined( 'WP_CLI' ) ) return;

require_once __DIR__ . '/inc/class-unconfirmed-users.php';

WP_CLI::add_command( 'unconfirmed', 'Unconfirmed_Users' );