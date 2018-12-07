<?php
/**
 * Single Page
 *
 * @package Wpbit4bytes\Template_Parts\Single
 */

use Wpbit4bytes\Theme\Utils as Utils;
$images = new Utils\Images();
$image  = $images->get_post_image( 'full_width' );


if(isset($section_args)){
  $the_query = new WP_Query( $section_args ); 
  if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) : $the_query->the_post(); 
     get_template_part( 'template-parts/sections/parts/header','full-image'  );
    endwhile;
  endif;
  wp_reset_postdata();
}else{
  get_template_part( 'template-parts/sections/parts/header','full-image'  );
}
?>


