<?php

/**
 * This class is responsible for displaying notices in WP Admin
 */

namespace WC_SLM\Admin;

class Notices {

  /* @var Notice array */
  private $notices = array();

  /**
   * Notices constructor
   */
  public function __construct() {
    add_action( 'admin_notices', array( $this, 'admin_notices' ) );
  }

  /**
   * Add new admin notice
   * @param $type
   * @param $message
   */
  public function add( $message, $type = 'error' ){
    $this->notices[] = array(
      'type' => $type,
      'message' => $message
    );
  }

  /**
   * Display the admin notices
   */
  public function admin_notices() {
    if( ! empty( $this->notices ) ) {
      foreach( $this->notices as $notice ) {
        echo '<div class="' . esc_attr( $notice['type'] ) . '">
          <p>'. wp_kses( $notice['message'], wp_kses_allowed_html( 'post' ) ) .'</p>
        </div>';
      }
    }
  }

}