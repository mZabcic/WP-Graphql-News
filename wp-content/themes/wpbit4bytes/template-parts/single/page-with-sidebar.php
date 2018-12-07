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
<div class="page-sidebar__container">
<div class="page-sidebar__content-wrap">
<section class="page-sidebar__main" id="<?php echo esc_attr( $post->ID ); ?>">
  <div class="page-sidebar__image" style="background-image: url('<?php echo esc_url( $image['image'] ); ?>');"></div>
  <header>
    <h1 class="page-sidebar__title">
      <?php the_title(); ?>
    </h1>
  </header>
  <div class="page-sidebar__content content-style content-media-style">
    <?php the_content(); ?>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>


<aside id="sidebar" class="page-sidebar__sidebar">
  dsadasdas
    <?php  
    
      get_sidebar('page');

      echo do_shortcode('[catlist taxonomy="profilerole" post_type="profile" numberposts="2" ]');
      echo do_shortcode('[catlist  numberposts="2" ]');
    ?>

    
</aside>
</div>
</div>