<?php

namespace WC_SLM;

class Unit_Tests {

  private $wp_tests_dir;

  public function __construct(){

    ini_set( 'display_errors','on' );
    error_reporting( E_ALL );

    $this->wp_tests_dir = '/tmp/wordpress-tests-lib';
    $this->includes();

    require_once $this->wp_tests_dir . '/includes/functions.php';

    tests_add_filter( 'muplugins_loaded', array( $this, 'load' ) );

    require_once $this->wp_tests_dir . '/includes/bootstrap.php';
  }

  public function load() {
    require_once \WP_CONTENT_DIR . '/plugins/woocommerce/woocommerce.php';
    require_once dirname( __FILE__ ) . '/../../../woocommerce-software-license-manager.php';
  }

  /**
   *
   */
  public function includes(){
    require_once 'vendor/autoload.php';
  }

}

new Unit_Tests();