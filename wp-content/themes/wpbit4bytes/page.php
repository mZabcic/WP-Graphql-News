<?php
/**
 * 
 * Display regular page
 * 
 *
 * @package Wpbit4bytes
 */

get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/single/page' );
  }
}

get_footer();
