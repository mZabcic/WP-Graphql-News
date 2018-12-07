<?php
/**
 * Template Name: Page with sidebar
 * Display regular page
 * 
 *
 * @package Wpbit4bytes
 */

get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/single/page','with-sidebar' );
  }
}




get_footer();
