<?php
/**
 * Plugin Name: Input Mask For Elementor Form Fields
 * Description: Apply mask on Elementor form input fields – Add phone number formatting, date and time masks, credit card masks, CPF, CNPJ, CEP (Brazilian formats) and more. 
 * Plugin URI: https://coolplugins.net/add-input-masks-elementor-form?ref=mask
 * Author: Rodrigo Bogdanowicz
 * Author URI: https://www.bogdanowicz.com.br
 * Version: 4.3.4   
 * License: GPL v2 or later   
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html  
 * Text Domain: mask-form-elementor
 * Elementor tested up to: 4.0.0
 * Elementor Pro tested up to: 4.0.0
 */

defined( 'ABSPATH' ) || die( 'The silence is golden!' );

// Define plugin version and paths.
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound	
define( 'MFE_VERSION', '4.3.4' );
define('MFE_PHP_MINIMUM_VERSION','7.4');
define('MFE_WP_MINIMUM_VERSION','5.5');
define( 'MFE_PLUGIN_FILE', __FILE__ );
define( 'MFE_PLUGIN_PATH', plugin_dir_path( MFE_PLUGIN_FILE ) );
define( 'MFE_PLUGIN_URL', plugin_dir_url( MFE_PLUGIN_FILE ) );
define( 'MFE_FEEDBACK_URL', 'https://feedback.coolplugins.net/' );


if ( ! function_exists( 'is_plugin_active' ) ) {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

require_once MFE_PLUGIN_PATH .'includes/class-main-mask-form-elementor.php';