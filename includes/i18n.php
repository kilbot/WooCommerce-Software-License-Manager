<?php

/**
 * This class is responsible for loading the correct language file
 */

namespace WC_SLM;

class i18n {

  /**
   * i18n constructor
   */
  public function __construct() {
    $this->load_plugin_textdomain();
  }

  /**
   *
   */
  public function load_plugin_textdomain() {
    $locale = apply_filters( 'plugin_locale', get_locale(), 'wc-slm' );
    load_textdomain( 'wc-slm', WP_LANG_DIR . '/plugins/wc-slm-' . $locale . '.mo' );
  }

}