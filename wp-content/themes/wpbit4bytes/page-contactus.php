<?php
/**
 * Template Name: Contact us
 * Display regular page
 * 
 *
 * @package Wpbit4bytes
 */
use Wpbit4bytes\Theme\Utils as Utils;
$images = new Utils\Images();
$image  = $images->get_post_image( 'full_width' );

get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
   // get_template_part( 'template-parts/single/page' );



?>

<!-- Single Content Section -->
<section class="contactus" id="<?php echo esc_attr( $post->ID ); ?>">
<div class="contactus__container">
  <header>
    <h1 class="contactus__title">
      <?php the_title(); ?>
    </h1>
  </header>
  <div class="contactus__image" style="background-image: url('<?php echo esc_url( $image['image'] ); ?>');"></div>
  <h3 class="contactus__form-title">
            <?php echo __('Contact us',B4B_THEME_NAME); ?>
    </h3>  
  <div class="contactus__content">
      <div class="contactus__form">
       
        <?php echo do_shortcode('[contact-form-7 id="104" title="Contact form 1"]'); ?>
      </div>
      <div class="contactus__details">
        <?php the_content(); ?>
      </div>
    
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>

<?php
  }
}

get_template_part( 'template-parts/sections/newsletter' );
get_footer();
