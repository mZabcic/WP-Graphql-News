<?php
/**
 * Single page for Posts
 *
 * @package Wpbit4bytes
 */

get_header();
echo "Template: single";
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/single/post' );
  }
}

get_footer();
