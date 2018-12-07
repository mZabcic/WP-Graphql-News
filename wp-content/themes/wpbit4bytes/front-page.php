<?php
/**
 * Display regular index/home page
 *
 * @package Wpbit4bytes
 */

get_header();










// Listing Grid Blog Post horizontal Indented
$section_args = array(
  'post_type'   => 'post',
  'post_status' => 'publish',
  'numberposts' => 10,
  'featured'    => true,
  'class-list'  => 'listing-post-list--indented',
  'section-title' => __('Najnovije vijest', 'news'),
  'section-subtitle'=> __('Aktualne novosti iz svih sfera života', 'news'),

);
require locate_template( 'template-parts/sections/listing-post-list.php' );







get_footer();