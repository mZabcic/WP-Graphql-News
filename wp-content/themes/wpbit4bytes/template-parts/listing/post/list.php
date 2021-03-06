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
<div class="post-list">
  <div class="post-list__container">
  <a class="post-list__image-link" href="<?php the_permalink(); ?>" style="background-image1:url(<?php echo esc_url( $image['image'] ); ?>)">
    <div class="post-list__image">
       <?php the_post_thumbnail('listing-grid'); ?>
    </div>
  </a>
  <div class="post-list__content">
    <header class="post-list__heading">
    <h2 class="post-list__heading-title">
      <a class="post-list__heading-link" href="<?php the_permalink(); ?>">
        <?php esc_html( the_title() ); ?>
      </a>
    </h2>
    </header>
    <div class="post-list__excerpt content-section-style1">
      <?php the_excerpt(); ?>
    </div>
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</div>
