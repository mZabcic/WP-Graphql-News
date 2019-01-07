<?php
/**
 * Display regular index/home page
 *
 * @package Wpbit4bytes
 */

get_header();



?>
<section class="front-page">
<div class="front-page__main">
<?php

$categories = get_terms( 
  'category', 
  array('parent' => 0)
);



foreach($categories as $category) {
// Listing Grid Blog Post horizontal Indented
$section_args = array(
  'post_type'   => 'post',
  'post_status' => 'publish',
  'numberposts' => 10,
  'category_name' => $category->slug

);
//require locate_template( 'template-parts/sections/listing-post-list.php' );
require locate_template( 'template-parts/sections/listing-front-page.php' );
}

?>
</div>
<aside>
 <?php get_template_part( 'template-parts/sections/latest-news' );  ?>
</aside>


</section>
<?php





get_footer();