<?php
/**
 * The admin sidebar menu specific functionality.
 *
 * @since   2.0.0
 * @package Wpbit4bytes\Admin
 */

namespace Wpbit4bytes\Admin;

/**
 * Class Admin_Menus
 */
class Ajax {

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


    public function get_current_user_info() {
        $user_id = get_current_user_id();
        if ( $this->user_is_logged_in( $user_id ) && $this->user_exists( $user_id ) ) {
            wp_send_json_success(
                wp_json_encode( get_user_by( 'id', $user_id ) )
            );
        }
    }

    private function user_is_logged_in( $user_id ) {
        $is_logged_in = true;
        if ( 0 === $user_id ) {
            wp_send_json_error(
                new WP_Error( '-2', 'The visitor is not currently logged into the site.' )
            );
            $is_logged_in = false;
        }
        return $is_logged_in;
    }

    private function user_exists( $user_id ) {
        $user_exists = true;
        if ( false === get_user_by( 'id', $user_id ) ) {
            wp_send_json_error(
                new WP_Error( '-1', 'No user was found with the specified ID [' . $user_id . ']' )
            );
            $user_exists = false;
        }
        return $user_exists;
    }


    function loadmore_search_ajax_handler(){
 
        // prepare our arguments for the query
        $args = json_decode( stripslashes( $_POST['query'] ), true );
        $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
        $args['post_status'] = 'publish';
     
        // it is always better to use WP_Query but not here
        query_posts( $args );
     
        if( have_posts() ) :
     
            // run the loop
            while( have_posts() ): the_post();
     
                // look into your theme code how the posts are inserted, but you can use your own HTML of course
                // do you remember? - my example is adapted for Twenty Seventeen theme
                get_template_part( 'template-parts/post/content', get_post_format() );
                // for the test purposes comment the line above and uncomment the below one
                // the_title();
     
     
            endwhile;
     
        endif;
        die; // here we exit the script and even no wp_reset_query() required!
    }

    //add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
    //add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}




/**
 * Registers the callback functions responsible for providing a response
 * to Ajax requests setup throughout the rest of the plugin.
 *
 * @since    1.0.0
 */
    public function setup_ajax_handlers() {
    
        add_action(
            'wp_ajax_get_current_user_info',
            array( $this, 'get_current_user_info' )
        );
    
        add_action(
            'wp_ajax_nopriv_get_current_user_info',
            array( $this, 'get_current_user_info' )
        );
    
    }


       /**
     * Callback function for the my_action used in the form.
     *
     * Processses the data recieved from the form, and you can do whatever you want with it.
     *
     * @return    echo   response string about the completion of the ajax call.
     */
    function my_action_callback() {
        // echo wp_die('<pre>' . print_r($_REQUEST) . "<pre>");

        check_ajax_referer( '_wpnonce', 'security');

        if( ! empty( $_POST )){

            if ( isset( $_POST['name'] ) ) {

                $name = sanitize_text_field( $_POST['name'] ) ;
            }

            if( isset( $_POST['email'] ) ) {

                $email = sanitize_text_field( $_POST['email'] ) ;
            }

            ///////////////////////////////////////////
            // do stuff with values
            // example : validate and save in database
            //          process and output
            /////////////////////////////////////////// 

            $response = "Wow <strong style= 'color:red'>". $name . "!</style></strong> you rock, you just made ajax work with oop.";
            //this will send data back to the js function:
            echo $response;

        } else {

            echo "Uh oh! It seems I didn't eat today";
        }

        wp_die(); // required to terminate the call so, otherwise wordpress initiates the termination and outputs weird '0' at the end.

    }

    function misha_filter_function(){
        $args = array(
            'orderby' => 'date', // we will sort posts by date
            'order'	=> $_POST['date'] // ASC or DESC
        );
     
        // for taxonomies / categories
        if( isset( $_POST['categoryfilter'] ) )
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $_POST['categoryfilter']
                )
            );
     
        // create $args['meta_query'] array if one of the following fields is filled
        if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'] || isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
            $args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true
     
        // if both minimum price and maximum price are specified we will use BETWEEN comparison
        if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] ) {
            $args['meta_query'][] = array(
                'key' => '_price',
                'value' => array( $_POST['price_min'], $_POST['price_max'] ),
                'type' => 'numeric',
                'compare' => 'between'
            );
        } else {
            // if only min price is set
            if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
                $args['meta_query'][] = array(
                    'key' => '_price',
                    'value' => $_POST['price_min'],
                    'type' => 'numeric',
                    'compare' => '>'
                );
     
            // if only max price is set
            if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
                $args['meta_query'][] = array(
                    'key' => '_price',
                    'value' => $_POST['price_max'],
                    'type' => 'numeric',
                    'compare' => '<'
                );
        }
     
     
        // if post thumbnail is set
        if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
            $args['meta_query'][] = array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
            );
     
        $query = new WP_Query( $args );
     
        if( $query->have_posts() ) :
            while( $query->have_posts() ): $query->the_post();
                echo '<h2>' . $query->post->post_title . '</h2>';
            endwhile;
            wp_reset_postdata();
        else :
            echo 'No posts found';
        endif;
     
        die();
    }
     
     
    
}
