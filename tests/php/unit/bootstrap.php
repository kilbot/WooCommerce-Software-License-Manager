<?php

  class Unit_Test_WC_SLM {

    private $wp_tests_dir;

    public function __construct(){

      ini_set( 'display_errors','on' );
      error_reporting( E_ALL );

      $this->wp_tests_dir = '/tmp/wordpress-tests-lib';
      $this->includes();

      require_once $this->wp_tests_dir . '/includes/functions.php';

      tests_add_filter( 'muplugins_loaded', array( $this, 'load_wc_pos' ) );

      require_once $this->wp_tests_dir . '/includes/bootstrap.php';
    }

    public function load_wc_pos() {
      require_once WP_CONTENT_DIR . '/plugins/woocommerce/woocommerce.php';
      require_once dirname( __FILE__ ) . '/../../../woocommerce-pos.php';
    }

    /**
     *
     */
    public function includes(){

    }

  }

  new Unit_Test_WC_SLM();