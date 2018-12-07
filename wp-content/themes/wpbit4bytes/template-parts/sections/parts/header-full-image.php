<?php
/**
 * Single Page
 *
 * @package Wpbit4bytes\Template_Parts\Single
 */

use Wpbit4bytes\Theme\Utils as Utils;
$images = new Utils\Images();
$image  = $images->get_post_image( 'full_width' );
?>

<!-- Single Content Section -->
<section class="page-header" id="<?php echo esc_attr( $post->ID ); ?>">
  <div class="page-header__image" style="background-image: url('<?php echo esc_url( $image['image'] ); ?>');">
  <div class="page-header__container">
  <div class="page-header__content-wrap">
  <header class="page-header__header">
    <h1 class="page-header__title">
      <?php the_title(); ?>
    </h1>
  </header>
  <div class="page-header__content">
    <?php the_content(); ?>
    <a href="<?php get_the_permalink(); ?>" class="btn btn--large">Saznaj više</a>
    </div>
  </div>
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>