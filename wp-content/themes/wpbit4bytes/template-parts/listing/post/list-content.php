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



<div class="post-list post-list--divider">
  <div class="post-list__container">
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
    <div class="post-list__cta">
       <a class="post-list__cta-link" href="<?php the_permalink(); ?>"><?php echo __('Learn More',B4B_THEME_NAME);?></a>
    </div>
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</div>
