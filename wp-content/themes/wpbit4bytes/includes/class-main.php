<?php
/**
 * The file that defines the main start class
 *
 * A class definition that includes attributes and functions used across both the
 * theme-facing side of the site and the admin area.
 *
 * @since   2.0.0
 * @package Wpbit4bytes\Includes
 */

namespace Wpbit4bytes\Includes;

use Wpbit4bytes\Admin as Admin;
use Wpbit4bytes\Admin\Menu as Menu;
use Wpbit4bytes\Plugins\Acf as Acf;
use Wpbit4bytes\Theme as Theme;
use Wpbit4bytes\Theme\Utils as Utils;


/**
 * The main start class.
 *
 * This is used to define admin-specific hooks, and
 * theme-facing site hooks.
 *
 * Also maintains the unique identifier of this theme as well as the current
 * version of the theme.
 */
class Main {

  /**
   * Loader variable for hooks
   *
   * @var Loader    $loader    Maintains and registers all hooks for the plugin.
   *
   * @since 2.0.0
   */
  protected $loader;

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
   * Load hooks and define some global variables.
   *
   * @since 2.0.0
   */
  public function __construct() {

    if ( defined( 'B4B_THEME_VERSION' ) ) {
      $this->theme_version = B4B_THEME_VERSION;
    } else {
      $this->theme_version = '1.0.0';
    }

    if ( defined( 'B4B_THEME_NAME' ) ) {
      $this->theme_name = B4B_THEME_NAME;
    } else {
      $this->theme_name = 'wpbit4bytes';
    }

    $this->load_dependencies();
    $this->define_theme_install_hooks();
    $this->define_admin_hooks();
    $this->define_theme_hooks();
    $this->define_ajax_hooks();
  }

  /**
   * Load the required dependencies.
   *
   * Create an instance of the loader which will be used to register the hooks
   * with WordPress.
   *
   * @since 2.0.0
   */
  private function load_dependencies() {
    $this->loader = new Loader();
  }

  /**
   * Define the locale for this theme for internationalization.
   *
   * @since 2.0.0
   */
  private function set_locale() {
    $plugin_i18n = new Internationalization( $this->get_theme_info() );

    $this->loader->add_action( 'after_setup_theme', $plugin_i18n, 'load_theme_textdomain' );
  }

    /**
   * Register all of the hooks related to the admin area functionality.
   *
   * @since 2.0.0
   */
  private function define_theme_install_hooks() {
    $install      = new Admin\ThemeInstall( $this->get_theme_info() );
    $this->loader->add_action( 'init',$install ,'create_profile_cpt', 0 );
    $this->loader->add_action( 'init',$install ,'create_education_cpt', 0 );
    $this->loader->add_filter('rewrite_rules_array',$install, 'fsp_insertrules');
    $this->loader->add_filter('query_vars',$install, 'fsp_insertqv');
    $this->loader->add_filter( 'af/form/button_attributes',$install, 'acf_filter_submit_button_attributes', 10, 3 );
    $this->loader->add_filter( 'af/form/field_attributes', $install,'acf_filter_field_attributes', 10, 4 );
    $this->loader->add_filter( 'af/form/args',$install, 'filter_args', 10, 2 );
    $this->loader->add_filter( 'af/form/before_render',$install, 'filter_form', 10, 2 );
    remove_filter('wp_head', 'rel_canonical');
    $this->loader->add_filter('wp_head',$install, 'fsp_rel_canonical');
    $this->loader->add_filter( 'wpseo_canonical',$install, 'wpseo_canonical_exclude' );


    $this->loader->add_filter('comment_form_default_fields',$install, 'remove_comment_fields');
    $this->loader->add_filter('pre_get_posts',$install, 'change_wp_search_size'); 
    $this->loader->add_filter( 'rest_allow_anonymous_comments',$install, 'allow_nologin_api' );
  }

  /**
   * Register all of the hooks related to the admin area functionality.
   *
   * @since 2.0.0
   */
  private function define_admin_hooks() {
    $admin       = new Admin\Admin( $this->get_theme_info() );
    $login       = new Admin\Login( $this->get_theme_info() );
    $editor      = new Admin\Editor( $this->get_theme_info() );
    $admin_menus = new Admin\Admin_Menus( $this->get_theme_info() );
    $users       = new Admin\Users( $this->get_theme_info() );
    $widgets     = new Admin\Widgets( $this->get_theme_info() );
    $menu        = new Menu\Menu( $this->get_theme_info() );
    $media       = new Admin\Media( $this->get_theme_info() );
    $ajax        = new Admin\Ajax( $this->get_theme_info() );

    // Admin.
    $this->loader->add_action( 'login_enqueue_scripts', $admin, 'enqueue_styles' );
    $this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles', 50 );
    $this->loader->add_filter( 'get_user_option_admin_color', $admin, 'set_admin_color_based_on_env' );
    $this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_scripts' );
    //$this->loader->add_filter( 'wps_subtitle_use_meta_box',$admin, 'wps_subtitle_use_meta_box', 10, 2 );

    // CUstom post types
    // TODO RAZDVOJITI
    //$this->loader->add_action( 'init',$admin ,'create_people_cpt', 0 );

    // Login page.
    $this->loader->add_filter( 'login_headerurl', $login, 'custom_login_url' );

    // Editor.
    $this->loader->add_action( 'admin_init', $editor, 'add_editor_styles' );

    // Sidebar.
    $this->loader->add_action( 'admin_menu', $admin_menus, 'remove_sub_menus' );

    // Users.
    $this->loader->add_action( 'set_user_role', $users, 'send_main_when_user_role_changes', 10, 2 );
    $this->loader->add_action( 'admin_init', $users, 'edit_editors_capabilities' );

    // Widgets.
    $this->loader->add_action( 'widgets_init', $widgets, 'register_widget_position' );

    // Menu.
    $this->loader->add_action( 'after_setup_theme', $menu, 'register_menu_positions' );

    // Media.
    $this->loader->add_action( 'upload_mimes', $media, 'enable_mime_types' );
    $this->loader->add_action( 'wp_prepare_attachment_for_js', $media, 'enable_svg_library_preview', 10, 3 );
    $this->loader->add_action( 'embed_oembed_html', $media, 'wrap_responsive_oembed_filter', 10, 4 );
    $this->loader->add_action( 'after_setup_theme', $media, 'add_theme_support' );
    $this->loader->add_action( 'after_setup_theme', $media, 'add_custom_image_sizes' );
    $this->loader->add_filter( 'wp_handle_upload_prefilter', $media, 'check_svg_on_media_upload' );
    
  }

  /**
   * Register all of the hooks related to the theme area functionality.
   *
   * @since 2.0.0
   */
  private function define_theme_hooks() {
    $theme           = new Theme\Theme( $this->get_theme_info() );
    $legacy_browsers = new Theme\Legacy_Browsers( $this->get_theme_info() );
    $gallery         = new Utils\Gallery( $this->get_theme_info() );
    $general         = new Theme\General( $this->get_theme_info() );
    $pagination      = new Theme\Pagination( $this->get_theme_info() );

    // Enque styles and scripts.
    $this->loader->add_action( 'wp_enqueue_scripts', $theme, 'enqueue_styles' );
    $this->loader->add_action( 'wp_enqueue_scripts', $theme, 'enqueue_scripts' );

    // Remove inline gallery css.
    $this->loader->add_filter( 'use_default_gallery_style', $theme, '__return_false' );

    // Legacy Browsers.
    $this->loader->add_action( 'template_redirect', $legacy_browsers, 'redirect_to_legacy_browsers_page' );

    /**
     * Optimizations
     *
     * This will remove some default functionality, but it mostly removes unnecessary
     * meta tags from the head section.
     */
    $this->loader->remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    $this->loader->remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    $this->loader->remove_action( 'wp_print_styles', 'print_emoji_styles' );
    $this->loader->remove_action( 'admin_print_styles', 'print_emoji_styles' );
    $this->loader->remove_action( 'wp_head', 'wp_generator' );
    $this->loader->remove_action( 'wp_head', 'wlwmanifest_link' );
    $this->loader->remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    $this->loader->remove_action( 'wp_head', 'rsd_link' );
    $this->loader->remove_action( 'wp_head', 'feed_links', 2 );
    $this->loader->remove_action( 'wp_head', 'feed_links_extra', 3 );
    $this->loader->remove_action( 'wp_head', 'rest_output_link_wp_head' );

    // Gallery.
    $this->loader->add_filter( 'post_gallery', $gallery, 'wrap_post_gallery', 10, 3 );

    // General.
    $this->loader->add_action( 'after_setup_theme', $general, 'add_theme_support' );

    // Pagination.
    $this->loader->add_filter( 'next_posts_link_attributes', $pagination, 'pagination_link_next_class' );
    $this->loader->add_filter( 'previous_posts_link_attributes', $pagination, 'pagination_link_prev_class' );


  }

  /**
   * Register all of the hooks related to the theme area functionality.
   *
   * @since 2.0.0
   */
  private function define_ajax_hooks() {



    // FORM INPUT AND CRUD
    // https://www.smashingmagazine.com/2011/10/how-to-use-ajax-in-wordpress/
    // NOUNCE CHECK

    $ajax        = new Admin\Ajax( $this->get_theme_info() );

    // Ajax.
    $this->loader->add_action('wp_ajax_searchloadmore', $ajax, 'loadmore_search_ajax_handler'); // wp_ajax_{action}
    $this->loader->add_action('wp_ajax_nopriv_searchloadmore', $ajax, 'loadmore_search_ajax_handler'); // wp_ajax_nopriv_{action}

    $this->loader->add_action('wp_ajax_userinfo', $ajax, 'get_current_user_info'); // wp_ajax_{action}
    $this->loader->add_action('wp_ajax_nopriv_userinfo', $ajax, 'get_current_user_info'); // wp_ajax_nopriv_{action}

    // Example of filter posts
    $this->loader->add_action('wp_ajax_myfilter', $ajax,'misha_filter_function'); 
    $this->loader->add_action('wp_ajax_nopriv_myfilter',$ajax, 'misha_filter_function');
  }

  /**
   * Run the loader to execute all of the hooks with WordPress.
   *
   * @since 2.0.0
   */
  public function run() {
    $this->loader->run();
  }

  /**
   * The reference to the class that orchestrates the hooks.
   *
   * @return Loader Orchestrates the hooks.
   *
   * @since 2.0.0
   */
  public function get_loader() {
    return $this->loader;
  }

  /**
   * The name used to uniquely identify it within the context of
   * WordPress and to define internationalization functionality.
   *
   * @return string Theme name.
   *
   * @since 2.0.0
   */
  public function get_theme_name() {
    return $this->theme_name;
  }

  /**
   * Retrieve the version number.
   *
   * @return string Theme version number.
   *
   * @since 2.0.0
   */
  public function get_theme_version() {
    return $this->theme_version;
  }

  /**
   * Retrieve the theme info array.
   *
   * @return array Theme info array.
   *
   * @since 2.0.0
   */
  public function get_theme_info() {
    return array(
        'theme_name'    => $this->theme_name,
        'theme_version' => $this->theme_version,
    );
  }
}
