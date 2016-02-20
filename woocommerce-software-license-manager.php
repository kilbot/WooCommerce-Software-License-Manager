<?php

/**
 * Plugin Name:       WooCommerce Software License Manager
 * Plugin URI:        http://wooslm.com
 * Description:       A license management solution for selling software with WooCommerce
 * Version:           0.0.1
 * Author:            <a href="https://github.com/kilbot">kilbot</a>, <a href="https://github.com/vdrnn">Vedran</a>
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-slm
 */

// project namespace
namespace WC_SLM;

// Define plugin constants.
define( __NAMESPACE__ . '\VERSION', '0.0.1' );
define( __NAMESPACE__ . '\PLUGIN_NAME', 'wc-slm' );
define( __NAMESPACE__ . '\PLUGIN_FILE', plugin_basename( __FILE__ ) );
define( __NAMESPACE__ . '\PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( __NAMESPACE__ . '\PLUGIN_URL', trailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );

// autoloader
spl_autoload_register( __NAMESPACE__ . '\\autoload' );

function autoload( $cls ) {
  $cls = ltrim( $cls, '\\' );
  if ( strpos( $cls, __NAMESPACE__ ) !== 0 )
    return;

  $cls = str_replace( __NAMESPACE__, '', $cls );
  $path = PLUGIN_PATH . 'includes' . str_replace( '\\', DIRECTORY_SEPARATOR, $cls ) . '.php';
  require_once( $path );
}

// activate plugin
new Activator( new Admin\Notices() );

// deactivate plugin
new Deactivator();