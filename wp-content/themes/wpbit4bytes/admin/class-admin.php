<?php
/**
 * The Admin specific functionality.
 * General stuff that is not specific to any class.
 *
 * @since   2.0.0
 * @package Wpbit4bytes\Admin
 */

namespace Wpbit4bytes\Admin;

use Wpbit4bytes\Helpers as General_Helpers;

/**
 * Class Admin
 */
class Admin {

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
   * General Helper class
   *
   * @var object General_Helper
   *
   * @since 2.0.1
   */
  public $general_helper;

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

    $this->general_helper = new General_Helpers\General_Helper();
  }

  /**
   * Register the Stylesheets for the admin area.
   *
   * @since 2.0.0
   */
  public function enqueue_styles() {

    $main_style = '/skin/public/styles/applicationAdmin.css';
    wp_register_style( $this->theme_name . '-style', get_template_directory_uri() . $main_style, array(), $this->general_helper->get_assets_version( $main_style ) );
    wp_enqueue_style( $this->theme_name . '-style' );

  }

  /**
   * Register the JavaScript for the admin area.
   *
   * @since 2.0.0
   */
  public function enqueue_scripts() {

    $main_script = '/skin/public/scripts/applicationAdmin.js';
    wp_register_script( $this->theme_name . '-scripts', get_template_directory_uri() . $main_script, array(), $this->general_helper->get_assets_version( $main_script ) );
    wp_enqueue_script( $this->theme_name . '-scripts' );

  }

  /**
   * Method that changes admin colors based on environment variable
   *
   * @param string $color_scheme Color scheme string.
   * @return string              Modified color scheme.
   *
   * @since 2.1.0
   */
  public function set_admin_color_based_on_env( $color_scheme ) {
    if ( ! defined( 'B4B_ENV' ) ) {
      return false;
    }

    if ( B4B_ENV === 'production' ) {
      $color_scheme = 'sunrise';
    } elseif ( B4B_ENV === 'staging' ) {
      $color_scheme = 'blue';
    } else {
      $color_scheme = 'fresh';
    }

    return $color_scheme;
  }

  function wps_subtitle_use_meta_box( $use_meta_box, $post_type ) {
    if ( 'page' == $post_type ) {
      return true;
    }
    return $use_meta_box;
  }
  

  // Register Custom Post Type People
// Post Type Key: people
function create_people_cpt() {
  
  $labels = array(
		'name'              => _x( 'Profile Categorys', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Profile Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Custom Taxonomies', 'textdomain' ),
		'all_items'         => __( 'All Custom Taxonomies', 'textdomain' ),
		'parent_item'       => __( 'Parent peoplerole', 'textdomain' ),
		'parent_item_colon' => __( 'Parent peoplerole:', 'textdomain' ),
		'edit_item'         => __( 'Edit ', 'textdomain' ),
		'update_item'       => __( 'Update ', 'textdomain' ),
		'add_new_item'      => __( 'Add New ', 'textdomain' ),
		'new_item_name'     => __( 'New', 'textdomain' ),
		'menu_name'         => __( 'Profile Categories', 'textdomain' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'textdomain' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => false,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'profilerole', array('profile', ), $args );


	$labels = array(
		'name' => __( 'Profile', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Profile', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Profiles', 'textdomain' ),
		'name_admin_bar' => __( 'Profiles', 'textdomain' ),
		'archives' => __( 'Profiles Archives', 'textdomain' ),
		'attributes' => __( 'Profiles Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent People:', 'textdomain' ),
		'all_items' => __( 'All', 'textdomain' ),
		'add_new_item' => __( 'Add New Profile', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Profile', 'textdomain' ),
		'edit_item' => __( 'Edit Profile', 'textdomain' ),
		'update_item' => __( 'Update Profile', 'textdomain' ),
		'view_item' => __( 'View Profile', 'textdomain' ),
		'view_items' => __( 'View Profiles', 'textdomain' ),
		'search_items' => __( 'Search Profile', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Profile Image', 'textdomain' ),
		'set_featured_image' => __( 'Set profile image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove profile image', 'textdomain' ),
		'use_featured_image' => __( 'Use as profile image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Profiles', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Profile', 'textdomain' ),
		'items_list' => __( 'Custom Posts list', 'textdomain' ),
		'items_list_navigation' => __( 'Custom Posts list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Custom Posts list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Profiles', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-users',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'author', 'page-attributes', 'post-formats', ),
		'taxonomies' => array('profilerole', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
  register_post_type( 'profile', $args );
  
  add_post_type_support( 'profile', 'wps_subtitle' );

}


}
