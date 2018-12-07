<?php
/**
 * Main header bar
 *
 * @package Wpbit4bytes\Template_Parts\Header
 */

use Wpbit4bytes\Admin\Menu as Menu;
$menu             = new Menu\Menu();
$blog_name        = get_bloginfo( 'name' );
$blog_description = get_bloginfo( 'description' );
$header_logo_info = $blog_name . ' - ' . $blog_description;
?>
<div class="header header--fixed hide-from-print slide slide--reset headroom--top" id="header">
<div class="header__container">
  <a class="header__logo-link" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $blog_name ); ?>">
    <img class="header__logo-img" src="<?php echo esc_url( B4B_IMAGE_URL . 'bit.svg' ); ?>" title="<?php echo esc_attr( $header_logo_info ); ?>" alt="<?php echo esc_attr( $header_logo_info ); ?>" />
  </a>
  <span class="header__nav-mobile-menu-trigger">
	 	<div class="menu-toggler" id="menu-toggle">
			<span></span>
			<span></span>
			<span></span>
		</div>
	 </span>
  <div class="header__nav">
  
  <?php
    echo esc_html( $menu->bem_menu( 'header_main_nav', 'main-navigation' ) );

   // get_template_part( 'template-parts/header/search', 'form' );
    get_template_part( 'template-parts/header/search', 'form-icon' );
  ?>
  <div class="header__contact">email@email.com</div>
  </div>
  </div>
</div>
