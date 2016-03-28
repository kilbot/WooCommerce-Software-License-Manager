<?php

/**
 * This class is responsible for displaying notices in WP Admin
 */

namespace WC_SLM\Admin;

class Notices {

  /* @var */
  static private $notices = array();

  /**
   * Constructor
   */
  public function __construct () {
    add_action( 'admin_notices', array( $this, 'admin_notices' ) );
  }

  /**
   * @param $type
   * @param $message
   */
  static public function add ( $message, $type = 'error' ) {
    self::$notices[] = array(
      'type' => $type,
      'message' => $message
    );
  }

  /**
   * Display the admin notices
   */
  public function admin_notices () {
    if ( !empty( $notices ) ) {
      foreach ( $notices as $notice ) {
        echo '<div class="' . esc_attr( $notice[ 'type' ] ) . '">
          <p>' . wp_kses( $notice[ 'message' ], wp_kses_allowed_html( 'post' ) ) . '</p>
          </div>';
      }
    }
  }

}