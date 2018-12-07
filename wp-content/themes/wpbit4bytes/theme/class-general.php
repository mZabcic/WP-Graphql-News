<?php
/**
 * The General specific functionality.
 *
 * @since   2.0.0
 * @package Wpbit4bytes\Theme
 */

namespace Wpbit4bytes\Theme;

/**
 * Class General
 */
class General {

  /**
   * Global theme name
   *
   * @var string
   *
   * @since 2.0.0
   */
  protected $theme_name;

  /**
   * Global theme version
   *
   * @var string
   *
   * @since 2.0.0
   */
  protected $theme_version;

  /**
   * Initialize class
   *
   * @param array $theme_info Load global theme info.
   *
   * @since 2.0.0
   */
  public function __construct( $theme_info = null ) {
    $this->theme_name    = $theme_info['theme_name'];
    $this->theme_version = $theme_info['theme_version'];
  }

  /**
   * Enable theme support
   *
   * @since 2.0.0
   */
  public function add_theme_support() {
    add_theme_support( 'title-tag', 'html5' );
  }

}
