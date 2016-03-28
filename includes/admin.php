<?php

/**
 * Conditionally loads classes for WP Admin
 */

namespace WC_SLM;

class Admin {

  /**
   * Admin constructor
   */
  public function __construct() {
    $this->init();
  }

  /**
   *
   */
  private function init() {
    new Admin\Notices();
  }

}