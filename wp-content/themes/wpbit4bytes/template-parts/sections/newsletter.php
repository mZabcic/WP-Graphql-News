<?php
/**
 * Newsletter
 *
 * @package Wpbit4bytes\Template_Parts\Sections\Newsletter
 */

/* 
 * Mailchimp code 
 * 
    {response}
    <p class="newsletter__email">    
        <input type="email" name="EMAIL" placeholder="Your email address" required />
    </p>
    <p class="newsletter__gdpr">
        <label>
        <input name="AGREE_TO_TERMS" type="checkbox" value="1" required="">I have read and agree to the terms &amp; conditions
        </label>
    </p>
    <p class="newsletter__cta">
        <input type="submit" value="Sign up" class="btn" />
    </p>
*/

use Wpbit4bytes\Theme\Utils as Utils;
?>

<!-- Single Content Section -->
<section class="newsletter" id="newsletter">
  <div class="newsletter__container">
  <header class="newsletter__header">
    <h1 class="newsletter__title">
      <?php echo __('Newsletter',B4B_THEME_NAME); ?>
    </h1>
  </header>
  <div class="newsletter__content ">
      <?php  echo do_shortcode('[mc4wp_form id="9"]'); ?>
  </div>
  </div>

  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>
