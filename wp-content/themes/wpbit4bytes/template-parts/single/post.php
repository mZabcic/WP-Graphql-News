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
<section class="single-news" id="<?php echo esc_attr( $post->ID ); ?>">
  <header>
    <div class="single-news__background" style="background-image: url('<?php echo esc_url( $image['image'] ); ?>');">
      <h1 class="single-news__title">
        <?php the_title(); ?>
      </h1>
    </div>
  </header>
  <div class="single-news__content content-style content-media-style">
    <?php the_content(); ?>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>
