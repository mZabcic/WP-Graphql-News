<?php
/**
 * Grid Article
 *
 * @package Wpbit4bytes\Template_Parts\Listing\Articles
 */

use Wpbit4bytes\Theme\Utils as Utils;
$images = new Utils\Images();
$image  = $images->get_post_image( 'full_width' );
?>
<article class="search-grid">
  <div class="search-grid__container">
  <div class="search-grid__content-wrap">
  <a class="search-grid__image" href="<?php the_permalink(); ?>" style="background-image:url(<?php echo esc_url( $image['image'] ); ?>)"></a>
  <div class="search-grid__content">
    <header>
    <h2 class="search-grid__heading">
      <a class="search-grid__heading-link" href="<?php the_permalink(); ?>">
        <?php esc_html( the_title() ); ?>
      </a>
    </h2>
    </header>
    <div class="search-grid__excerpt">
      <?php the_excerpt(); ?>
    </div>
  </div>
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
