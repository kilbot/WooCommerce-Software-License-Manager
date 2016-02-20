<?php

/**
 * Initialises required classes for plugin lifecycle on 'init' action
 */

namespace WC_SLM;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

class Setup {

  /**
   * Setup constructor
   */
  public function __construct() {
    add_action( 'init', array( $this, 'init' ) );
  }

  /**
   *
   */
  public function init() {

    // common
    new i18n();
    new API();

    // ajax only
    if ( is_admin() && ( defined('DOING_AJAX') && DOING_AJAX ) ) {

    }

    // admin only
    if ( is_admin() && !( defined('DOING_AJAX') && DOING_AJAX ) ) {

    }

    // frontend only
    else {

    }

  }

}