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
class ThemeInstall {

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
   * Register Profile Custom post.
   *
   * @since 2.0.0
   */
    function create_profile_cpt() {
        
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

    /**
     * Register Profile Custom post.
     *
     * @since 2.0.0
     */
    function create_education_cpt() {
        $labels = array(
            'name' => __( 'Education', 'Post Type General Name', 'textdomain' ),
            'singular_name' => __( 'Education', 'Post Type Singular Name', 'textdomain' ),
            'menu_name' => __( 'Education', 'textdomain' ),
            'name_admin_bar' => __( 'Education', 'textdomain' ),
            'archives' => __( 'Education Archives', 'textdomain' ),
            'attributes' => __( 'Education Attributes', 'textdomain' ),
            'parent_item_colon' => __( 'Parent People:', 'textdomain' ),
            'all_items' => __( 'All', 'textdomain' ),
            'add_new_item' => __( 'Add New Profile', 'textdomain' ),
            'add_new' => __( 'Add New', 'textdomain' ),
            'new_item' => __( 'New Profile', 'textdomain' ),
            'edit_item' => __( 'Edit Profile', 'textdomain' ),
            'update_item' => __( 'Update Profile', 'textdomain' ),
            'view_item' => __( 'View Profile', 'textdomain' ),
            'view_items' => __( 'View Education', 'textdomain' ),
            'search_items' => __( 'Search Profile', 'textdomain' ),
            'not_found' => __( 'Not found', 'textdomain' ),
            'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
            'featured_image' => __( 'Profile Image', 'textdomain' ),
            'set_featured_image' => __( 'Set profile image', 'textdomain' ),
            'remove_featured_image' => __( 'Remove profile image', 'textdomain' ),
            'use_featured_image' => __( 'Use as profile image', 'textdomain' ),
            'insert_into_item' => __( 'Insert into Education', 'textdomain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Profile', 'textdomain' ),
            'items_list' => __( 'Custom Posts list', 'textdomain' ),
            'items_list_navigation' => __( 'Custom Posts list navigation', 'textdomain' ),
            'filter_items_list' => __( 'Filter Custom Posts list', 'textdomain' ),
        );
        $args = array(
            'label' => __( 'Education', 'textdomain' ),
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
            'hierarchical' => true,
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'publicly_queryable' => true,
            'query_var' => true,
            //'rewrite' => true,
            'rewrite' => array('slug' => 'edukacija'),
        );
        register_post_type( 'education', $args );
        flush_rewrite_rules();

        add_post_type_support( 'education', 'wps_subtitle' );
    }


    // Adding fake pages' rewrite rules
    function fsp_insertrules($rules)
    {
         // Fake pages' permalinks and titles. Change these to your required sub pages.
        $my_fake_pages = array(
            'reviews' => 'Reviews',
            'narudzba' => 'Narudžba',
            'author' => 'Author Bio'
        );
      
       // global $my_fake_pages;
      
        $newrules = array();
        foreach ($my_fake_pages as $slug => $title)
            $newrules['edukacija/([^/]+)/' . $slug . '/?$'] = 'index.php?education=$matches[1]&fpage=' . $slug;
      
        return $newrules + $rules;
    }
    // Tell WordPress to accept our custom query variable
    function fsp_insertqv($vars)
    {
        array_push($vars, 'fpage');
        return $vars;
    }
     // Remove WordPress's default canonical handling function
    function fsp_rel_canonical()
     {
         global $current_fp, $wp_the_query;
       
         if (!is_singular())
             return;
       
         if (!$id = $wp_the_query->get_queried_object_id())
             return;
       
         $link = trailingslashit(get_permalink($id));
       
         // Make sure fake pages' permalinks are canonical
         if (!empty($current_fp))
             $link .= user_trailingslashit($current_fp);
       
         echo '<link rel="canonical" href="'.$link.'" />';
     }

    function wpseo_canonical_exclude( $canonical ) {
        global $post;
        if (is_singular('edukacija')) {
            $canonical = false;
        }
        return $canonical;
    }

    /**
     * Register ACF FORM.
     *
     * @since 2.0.0
     */
    function acf_filter_submit_button_attributes( $attributes, $form, $args ) {
        $attributes['class'] .= ' btn'; 
        return $attributes;
    }
    function acf_filter_field_attributes( $attributes, $field, $form, $args ) {
        $attributes['id'] = 'form-id';
        
        if ($field['type'] == 'text'){
           // $field['class'] .= ' input';
        }
        ///echo '<pre>';
       // var_dump($field);
        //
       // echo '</pre>';
        return $attributes;
    }
    function filter_args( $args, $form ) {
        $args['submit_text'] = 'Send';
       // echo '<pre>';
       // var_dump($args);
        //echo '</pre>';
        return $args;
    }
    //Can be used for example to modify the form title, description, or success message
    function filter_form( $form, $args ) {
        $form['display']['description'] = 'New form description';
        
        return $form;
    }
 




//add_filter( 'rwmb_meta_boxes', 'your_prefix_get_meta_box' );

}
