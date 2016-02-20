<?php

/**
 * This class is responsible for loading the correct language file
 */

namespace WC_SLM;

class API {

  /* @var string API version */
  const VERSION = '1.0.0';

  /**
   * API constructor.
   */
  public function __construct() {
    add_action( 'rest_api_init', array( $this, 'rest_api_init' ) );
  }

  /**
   * @return string
   */
  static public function get_api_url(){
    $version = substr( self::VERSION, 0, 1 );
    $url = get_home_url( null, "wc-slm/v{$version}/", is_ssl() ? 'https' : 'http' );
    return $url;
  }

  /**
   *
   */
  public function rest_api_init(){

  }

}