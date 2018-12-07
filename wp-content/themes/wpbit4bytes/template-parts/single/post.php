<?php
/**
 * Single Post
 *
 * @package Wpbit4bytes\Template_Parts\Single
 */

use Wpbit4bytes\Theme\Utils as Utils;

$images = new Utils\Images();
$image  = $images->get_post_image( 'full_width' );
?>

<!-- Single Content Section -->
<section class="single-post" id="<?php echo esc_attr( $post->ID ); ?>">
  <div class="single-post__image" data-normal="<?php echo esc_url( $image['image'] ); ?>"></div>
  <header>
    <h1 class="single-post__title">
      <?php the_title(); ?>
    </h1>
  </header>
  <div class="single-post__content content-style content-media-style">
    <?php the_content(); ?>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>
