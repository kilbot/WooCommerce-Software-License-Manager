<?php

/**
 * The Activator is responsible for compatibility checking and any initial settings.
 * If the system passes checks the activator will launch setup on 'plugins_loaded' action.
 */

namespace WC_SLM;

class Activator {

  // minimum requirements
  const WP_MIN_VERSION = '4.4.0';
  const WC_MIN_VERSION = '2.5.0';
  const PHP_MIN_VERSION = '5.4';

  /**
   * @param $file
   */
  public function __construct( $file ) {
    register_activation_hook( $file, array( $this, 'activate' ) );
    add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );
    add_action( 'plugins_loaded', array( $this, 'run' ) );
  }


  /**
   * Checks for valid install and begins execution of the plugin.
   */
  public function run(){
    new Setup();
  }

  /**
   * Fired when the plugin is activated.
   *
   * @param $network_wide
   */
  public function activate( $network_wide ) {
    if ( function_exists( 'is_multisite' ) && is_multisite() ) {
      if ( $network_wide  ) {
        // Get all blog ids
        $blog_ids = $this->get_blog_ids();
        foreach ( $blog_ids as $blog_id ) {
          switch_to_blog( $blog_id );
          $this->single_activate();
          restore_current_blog();
        }
      } else {
        self::single_activate();
      }
    } else {
      self::single_activate();
    }
  }

  /**
   * Fired when a new site is activated with a WPMU environment.
   *
   * @param $blog_id
   */
  public function activate_new_site( $blog_id ) {
    if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
      return;
    }
    switch_to_blog( $blog_id );
    $this->single_activate();
    restore_current_blog();
  }

  /**
   * Get all blog ids of blogs in the current network that are:
   * - not archived
   * - not spam
   * - not deleted
   */
  private function get_blog_ids() {
    global $wpdb;
    // get an array of blog ids
    $sql = "SELECT blog_id FROM $wpdb->blogs
      WHERE archived = '0' AND spam = '0'
      AND deleted = '0'";
    return $wpdb->get_col( $sql );
  }

  /**
   * Fired when the plugin is activated.
   */
  public function single_activate() {

  }

  /**
   * Checks that the WordPress setup meets the plugin requirements
   * @global string $wp_version
   * @return boolean
   */
  private function check_requirements() {
    global $wp_version;
    if ( ! version_compare( $wp_version, $this->wp_version, '>=' ) ) {
      add_action( 'admin_notices', array( $this, 'display_notice' ) );
      return false;
    }

    return true;
  }

  /**
   * Display the requirement notice
   * @static
   */
  public function display_notice() {
    echo '<div id="message" class="error"><p><strong></strong></p></div>';
  }

}