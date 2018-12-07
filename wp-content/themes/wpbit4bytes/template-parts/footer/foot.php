<?php
/**
 * Footer
 *
 * @package Wpbit4bytes\Template_Parts\Footer
 */

/**
 * Include cookies template
 */
require locate_template( 'template-parts/parts/cookies-notification.php' ); ?>

<a href="#html, body" class="scroll-to-top js-scroll-to-top">
  <i class="b4bicon b4bicon-tail-up"></i>
  <?php esc_html_e( 'To top', 'wpbit4bytes' ); ?>
</a>
<?php wp_footer(); ?>
</body>
</html>
