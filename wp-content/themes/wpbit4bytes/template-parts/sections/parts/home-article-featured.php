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

<section class="section-post section-post--feature" id="post-<?php echo esc_attr( $post->ID ); ?>">
  <div class="section-post__container">
    <header class="section-post__header">
      <h1 class="section-post__header-title">
        <?php the_title(); ?>
      </h1>
      <p class="section-post__header-subtitle">
          <?php  the_subtitle(); ?>
       </p>
    </header>
    <div class="section-post__content-wrap">
        <div class="section-post__image" style="background-image1: url('<?php echo esc_url( $image['image'] ); ?>');">
        <?php the_post_thumbnail('home-article'); ?>
        </div>
        <div class="section-post__content">
          <div class="section-post__content-text content-section-style">
              <?php 
              if ( has_excerpt( $post->ID ) ) {
                the_excerpt(); 
              } else {
                the_content(); 
              }
              ?>
          </div>
          <a href="<?php get_the_permalink(); ?>" class="section-post__content-cta"><?php echo __('Show more',B4B_THEME_NAME);?></a>
        </div>
    </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>