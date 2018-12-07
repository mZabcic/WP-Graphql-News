<?php
/**
 * Main header file
 *
 * @package Wpbit4bytes
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php
    get_template_part( 'template-parts/header/head/head' );
    wp_head();
  ?>
</head>
<body <?php body_class(); ?>>

<?php get_template_part( 'template-parts/header/header' ); ?>

<main class="main-content">
