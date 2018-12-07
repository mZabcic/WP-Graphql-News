<?php
/**
 * Single Page
 *
 * @package Wpbit4bytes\Template_Parts\Single
 */

use Wpbit4bytes\Theme\Utils as Utils;

// If args is defined
// example = $section_args = array( 'category_name' => 'staff' ) 
//




if(isset($section_args)){
  $name='article';
  if (isset($section_args['featured'])){
    $name='article-featured';
  }

  $the_query = new WP_Query( $section_args ); 
  if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) : $the_query->the_post(); 
    get_template_part( 'template-parts/sections/parts/home',$name  );
  endwhile;
  endif;
  wp_reset_postdata();
}else{
  get_template_part( 'template-parts/sections/parts/home','article'  );
}

