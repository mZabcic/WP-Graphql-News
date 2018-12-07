<?php
/**
 * Grid Article
 *
 * @package Wpbit4bytes\Template_Parts\Listing\Articles
 */

use Wpbit4bytes\Theme\Utils as Utils;
$images = new Utils\Images();
$image  = $images->get_post_image( 'listing-grid' );
?>
<div class="post-grid">
  <div class="post-grid__container">
  <a class="post-grid__image-link" href="<?php the_permalink(); ?>" style="background-image1:url(<?php echo esc_url( $image['image'] ); ?>)">
    <div class="post-grid__image">
       <?php the_post_thumbnail('listing-grid'); ?>
    </div>
  </a>
  <div class="post-grid__content">
    <header class="post-grid__heading">
    <h2 class="post-grid__heading-title">
      <a class="post-grid__heading-link" href="<?php the_permalink(); ?>">
        <?php esc_html( the_title() ); ?>
      </a>
      <span class="post-grid__date">
       <?php echo get_the_date(); ?>
      </span>
    </h2>
    </header>
    <div class="post-grid__excerpt content-section-style">
      <?php the_excerpt(); ?>
    </div>
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</div>
