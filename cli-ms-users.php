<?php
/**
 * Plugin Name: Unconfirmed Users CLI
 * Description: List and activate unconfirmed users
 */

if ( ! defined( 'WP_CLI' ) ) return;

/**
 * Unconfirmed Users
 */
class Unconfirmed_Users extends WP_CLI_Command {

	/**
	 * List unconfirmed signups from the last two days.
	 *
	 * ## OPTIONS
	 *
	 * [--all]
	 * : Show all unconfirmed users
	 *
	 * [--fields=<fields>]
	 * : Limit the output to specific object fields.
	 *
	 * [--format=<format>]
	 * : Accepted values: table, csv, json, count, ids. Default: table
	 *
	 * ## EXAMPLES
	 *
	 *     wp unconfirmed list
	 *
	 * @subcommand list
	 */
	function list_( $args, $assoc_args ) {

		$where = "WHERE active = 0 AND DATE_SUB(CURDATE(),INTERVAL 2 DAY) <= registered;";

		if ( isset( $assoc_args['all'] ) ) {
			$where = "WHERE active = 0";
		}

		global $wpdb;
		$results = $wpdb->get_results( "SELECT * FROM $wpdb->signups $where" );

		if ( $results ) {
			$formatter = new \WP_CLI\Formatter( $assoc_args, array_keys( (array) $results[0] ), 'unconfirmed' );
			$formatter->display_items( $results );
		} else {
			WP_CLI::line('No unconfirmed users found');
		}

	}

	/**
	 * Activate a user by signup ID, username, email, or activation key
	 *
	 * ## OPTIONS
	 *
	 * <user>
	 * : ID, username, email or key
	 *
	 * ## EXAMPLES
	 *
	 *     wp unconfirmed activate username
	 *
	 */
	function activate( $args, $assoc_args ) {
		global $wpdb;
		$key = null;

		list( $user ) = $args;

		// int check prevents false match with a key
		if ( is_int( $user ) ) {
			$key = $wpdb->get_var( $wpdb->prepare( "SELECT activation_key FROM $wpdb->signups WHERE signup_id = %d", $user ) );
		}
		if ( is_null( $key ) ) {
			foreach( array( 'user_login', 'user_email', 'activation_key') as $field ) {
				$key = $wpdb->get_var( $wpdb->prepare( "SELECT activation_key FROM $wpdb->signups WHERE $field = %s", $user ) );
				if ( ! is_null( $key ) ) {
					break;
				}
			}
		}

		// if *still* null...
		if ( is_null( $key ) ) {
			WP_CLI::error( "Activation key not found for given user: $user" );
		}

		$result = wpmu_activate_signup( $key );

		if ( ! is_wp_error( $result ) ) {
			WP_CLI::success( "User activated. Password: {$result['password']}" );
		} else {
			WP_CLI::error( $result->get_error_message() );
		}
	}

}

WP_CLI::add_command( 'unconfirmed', 'Unconfirmed_Users' );