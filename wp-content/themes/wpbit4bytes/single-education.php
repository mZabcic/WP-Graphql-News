<?php
/**
 * Single page for Posts
 *
 * @package Wpbit4bytes
 */

get_header();
$current_fp = get_query_var('fpage');
?>

<?php if (!$current_fp) {
        get_template_part( 'single', 'education-index' );
    } else if ($current_fp == 'narudzba') {
        get_template_part( 'single', 'education-order' );
    } else {
        echo 'Oh noo....';
    }; 
?>





<?php

get_footer();
