<?php
/**
 * Display footer content
 *
 * @package Wpbit4bytes\Template_Parts\Footer
 */
use Wpbit4bytes\Admin\Menu as Menu;
$menu             = new Menu\Menu();
$blog_name        = get_bloginfo( 'name' );
$blog_description = get_bloginfo( 'description' );
$header_logo_info = $blog_name . ' - ' . $blog_description;
?>

<footer class="footer">
  <div class="footer__container">
    <div class="footer__contact">
      <a class="footer__logo-link" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $blog_name ); ?>">
        <img class="footer__logo-img" src="<?php echo esc_url( B4B_IMAGE_URL . 'bit.svg' ); ?>" title="<?php echo esc_attr( $header_logo_info ); ?>" alt="<?php echo esc_attr( $header_logo_info ); ?>" />
      </a>
      <p>
        This is an example page. It’s different from a blog post because it will stay in one place and will show up
      </p>
    </div>
    <div class="footer__menu-primary">
   
    </div>
    <div class="footer__menu-secondary">
    
    </div>
    <div class="footer__menu-third">
    <?php
       echo esc_html( $menu->bem_menu( 'header_main_nav', 'footer-navigation' ) );
     ?>
    </div>
  <!-- insert content here -->
  </div>
</footer>
<div class="footer-copyright">
<div class="footer-copyright__container">
   <div class="footer-copyright__text">
   © 2018 Mislav Žabčić
   </div>
   <div class="footer-copyright__social">
      <ul class="footer-copyright__social-list">
        
      </ul>
   </div>
</div>
</div>