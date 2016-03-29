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
   *
   */
  static private function get_api_namespace(){
    $version = substr( self::VERSION, 0, 1 );
    return 'wc-slm/v' . $version;
  }

  /**
   * @param string $path
   * @return string
   */
  static public function get_api_url($path = ''){
    $endpoint = 'wp-json/' . self::get_api_namespace() . '/' . trim($path, '/');
    $url = get_home_url( null, $endpoint, is_ssl() ? 'https' : 'http' );
    return $url;
  }

  /**
   *
   */
  public function rest_api_init(){
    register_rest_route( self::get_api_namespace(), '/' );
  }

}