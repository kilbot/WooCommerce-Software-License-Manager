<?php

/**
 * The Deactivator is responsible for any clean up actions
 * - any changes to the database or filesystem should be kept in uninstall.php
 */

namespace WC_SLM;

class Deactivator {

  /**
   * @param $file
   */
  public function __construct( $file ){
    register_deactivation_hook( $file, array( $this, 'deactivate' ) );
  }

  /**
   * Fired when the plugin is deactivated.
   *
   * @param $network_wide
   */
  public function deactivate( $network_wide ) {

    if ( function_exists( 'is_multisite' ) && is_multisite() ) {

      if ( $network_wide ) {

        // Get all blog ids
        $blog_ids = $this->get_blog_ids();

        foreach ( $blog_ids as $blog_id ) {

          switch_to_blog( $blog_id );
          $this->single_deactivate();

          restore_current_blog();

        }

      } else {
        $this->single_deactivate();
      }

    } else {
      $this->single_deactivate();
    }

  }

  /**
   * Get all blog ids of blogs in the current network that are:
   * - not archived
   * - not spam
   * - not deleted
   */
  private static function get_blog_ids() {

    global $wpdb;

    // get an array of blog ids
    $sql = "SELECT blog_id FROM $wpdb->blogs
    WHERE archived = '0' AND spam = '0'
    AND deleted = '0'";

    return $wpdb->get_col( $sql );

  }

  /**
   * Fired when the plugin is deactivated.
   */
  public function single_deactivate() {

    // ../uninstall.php

  }

}