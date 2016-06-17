<?php
/**
Plugin Name: WC Algolia Places
Plugin URI: https://woocommerce.com
Author Name: Bryce / WooThemes
Author URI: https://woocommerce.com
Description: Integrates Algolia Places into your WooCommerce store's address fields.
Version: 0.1.0
License: GPL
*/

class WC_Algolia_Places {
	/**
	 * Class constructor.
	 * @return void
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Initialise the plugin or display a message if WooCommerce is not installed.
	 * @return void
	 */
	public function init() {
		if ( class_exists( 'WooCommerce' ) ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
		} else {
			add_action( 'admin_notices', array( $this, 'no_wc' ) );
		}
	}

	/**
	 * Load frontend assets for the plugin.
	 * @return void
	 */
	public function assets() {
		/**
		 * Get the sources for the Algolia Places JS, both remotely and local.
		 */
		$remote_source = 'https://cdn.jsdelivr.net/places.js/1/places.min.js';
		$local_source = plugin_dir_url( __FILE__ ) . 'assets/js/places.min.js';

		/**
		 * Check with the wc_algolia_places_js_remote filter if we should load
		 * the remote source or the local source. Default is remote.
		 */
		$source = apply_filters( 'wc_algolia_places_js_remote', true ) ? $remote_source : $local_source;

		/**
		 * Enqueue the Algolia Places JS on all relevant WooCommerce pages.
		 */
		if ( is_account_page() || is_checkout() ) {
			wp_enqueue_script( 'algolia-places', $source, array(), false, true );
			wp_enqueue_script( 'wc-algolia-places', plugin_dir_url( __FILE__ ) . 'assets/js/wc-algolia-places.js', array( 'algolia-places', 'jquery' ), false, true );
			wp_enqueue_style( 'wc-algolia-places', plugin_dir_url( __FILE__ ) . 'assets/css/wc-algolia-places.css' );
		}
	}

	/**
	 * No WooCommerce installed admin message.
	 * @return void
	 */
	public function no_wc() {
		echo '<div class="error"><p>' . sprintf( __( 'WC Algolia Places requires %s to be installed and active.', 'wc-algolia-places' ), '<a href="https://woocommerce.com/" target="_blank">WooCommerce</a>' ) . '</p></div>';
	}
}

new WC_Algolia_Places();