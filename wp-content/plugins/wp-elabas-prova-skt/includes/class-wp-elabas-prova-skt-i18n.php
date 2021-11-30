<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.cristiancascante.com/
 * @since      1.0.0
 *
 * @package    Wp_Elabas_Prova_Skt
 * @subpackage Wp_Elabas_Prova_Skt/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Elabas_Prova_Skt
 * @subpackage Wp_Elabas_Prova_Skt/includes
 * @author     Cristian Cascante <cristiancascante@gmail.com>
 */
class Wp_Elabas_Prova_Skt_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-elabas-prova-skt',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
