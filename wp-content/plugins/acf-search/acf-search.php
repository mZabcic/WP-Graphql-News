<?php
/*
Plugin Name: Advanced Custom Fields: Search Plugin
Plugin URI: https://www.directict.nl
Description: Adds the ability to search trough the selected ACF-fields
Author: Direct ICT B.V.
Version: 2.1.7
Author URI: https://www.directict.nl/
*/

global $acf_search_fields;
$acf_search_fields = array();

global $acf_search_plugin_data;

function acf_search_init() {
	global $acf_search_fields;
	$t=array();
	add_filter( 'posts_where' , 'posts_where_excerpt_not_empty' );
	$ACFFIELDS = new WP_Query(
		array(
			"posts_per_page" => -1,
			"post_type" => 'acf-field'
		)
	);
	remove_filter( 'posts_where' , 'posts_where_excerpt_not_empty' );

	while($ACFFIELDS->have_posts()) {
		$ACFFIELDS->the_post();
		if(!in_array(get_the_excerpt(), $t)) {
			if(get_the_excerpt()) {
				$acf_search_fields[] = (object)array("display" => get_the_title(), "return" => get_the_excerpt());
			}

			$t[] = get_the_excerpt();
		}
	}

  // manual buildingblockfields
  $acf_search_fields[] = (object)array("display" => 'Text', "return" => 'text');
  $acf_search_fields[] = (object)array("display" => 'Quote', "return" => 'quote'); 

}

add_action('init', 'acf_search_init');

// Register menu item
add_action( 'admin_menu', 'acf_search_menu');

function acf_search_menu() {
	add_options_page('ACF: Search Options', 'ACF: Search', 'manage_options', 'acf-search', 'acf_search_options');
}

function acf_search_options() {

	if($_SERVER['REQUEST_METHOD'] === "POST") {
		update_option('acf_search_fields', serialize($_POST['acf_search_fields']));
	}

	include __DIR__."/templates/options.php";
}


function posts_where_excerpt_not_empty( $where ) {
    $where .= " AND post_excerpt IS NOT NULL";
    return $where;
}

add_action('admin_init', 'acf_admin_init');

function acf_admin_init() {
	// Register the options
	add_option('acf_search_fields', serialize(array()));

	// Load the plugin data into an global
	global $acf_search_plugin_data;
	$acf_search_plugin_data = get_plugin_data( __FILE__ );
}

/**
 * [list_searcheable_acf list all the custom fields we want to include in our search query]
 * @return [array] [list of custom fields]
 */
function acf_search_list_searcheable_acf(){
  $list_searcheable_acf = (unserialize(get_option('acf_search_fields')));
  return $list_searcheable_acf;
}
/**
 * [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
 * @param  [query-part/string]      $where    [the initial "where" part of the search query]
 * @param  [object]                 $wp_query []
 * @return [query-part/string]      $where    [the "where" part of the search query as we customized]
 * see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
 * credits to Vincent Zurczak for the base query structure/spliting tags section
 */
 function acf_search_advanced_custom_search( $where, $wp_query ) {
     global $wpdb;

     if ( empty( $where ))
         return $where;

     // get search expression
     $terms = $wp_query->query_vars[ 's' ];

     // explode search expression to get search terms
     $exploded = explode( ' ', $terms );
     if( $exploded === FALSE || count( $exploded ) == 0 )
         $exploded = array( 0 => $terms );


     // get searcheable_acf, a list of advanced custom fields you want to search content in
     $list_searcheable_acf = acf_search_list_searcheable_acf();

 	// If you did not select any custom fields we need to return the default Query
 	if(count($list_searcheable_acf) == 0) {
 		return $where;
 	}

     // reset search in order to rebuilt it as we whish
     $where = '';

     foreach( $exploded as $tag ) :

 		$tag = esc_sql($wpdb->esc_like($tag));

         $where .= "
           AND (
             (wp_posts.post_title LIKE '%{$tag}%')
             OR (wp_posts.post_content LIKE '%{$tag}%')
             OR EXISTS (
               SELECT * FROM wp_postmeta
 	              WHERE post_id = wp_posts.ID
 	                AND (";
         foreach ($list_searcheable_acf as $searcheable_acf) :
           if ($searcheable_acf == $list_searcheable_acf[0]):
             $where .= " (meta_key LIKE '%{$searcheable_acf}%' AND meta_value LIKE '%{$tag}%') ";
           else :
             $where .= " OR (meta_key LIKE '%{$searcheable_acf}%' AND meta_value LIKE '%{$tag}%') ";
           endif;
         endforeach;
 	        $where .= ")
             )
             OR EXISTS (
               SELECT * FROM wp_comments
               WHERE comment_post_ID = wp_posts.ID
                 AND comment_content LIKE '%{$tag}%'
             )
             OR EXISTS (
               SELECT * FROM wp_terms
               INNER JOIN wp_term_taxonomy
                 ON wp_term_taxonomy.term_id = wp_terms.term_id
               INNER JOIN wp_term_relationships
                 ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
               WHERE (
           		taxonomy = 'post_tag'
             		OR taxonomy = 'category'
             		OR taxonomy = 'myCustomTax'
           		)
               	AND object_id = wp_posts.ID
               	AND wp_terms.name LIKE '%{$tag}%'
             )
         )";
     endforeach;

     return $where;
 }


add_filter( 'posts_search', 'acf_search_advanced_custom_search', 500, 2 );
