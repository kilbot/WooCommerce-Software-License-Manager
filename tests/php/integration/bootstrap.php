<?php

namespace WC_SLM;

class Integration_Tests {

  public function __construct(){

    ini_set( 'display_errors','on' );
    error_reporting( E_ALL );

    $this->includes();
    $this->setup();
    register_shutdown_function( array( $this, 'shutdown' ) );
  }

  /**
   *
   */
  public function includes(){
    require_once(__DIR__.'/../../../../../../wp-load.php');
    require_once 'vendor/autoload.php';
  }

  /**
   *
   */
  public function setup(){

  }

  /**
   * runs after all tests are complete
   */
  public function shutdown(){

  }

}

new Integration_Tests();