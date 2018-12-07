<?php
/**
 * Cookies Law notification
 *
 * @package Wpbit4bytes\Template_Parts\Parts
 */

global $wpbit4bytes_options;
$cookies_notification = $wpbit4bytes_options['cookies_notification_description'];

if ( ! empty( $cookies_notification ) && ! isset( $_COOKIE['cookie-law'] ) ) { // Input var okay. ?>

  <div class="cookies-notification js-cookies-notification">
    <div class="cookies-notification__wrap">
      <div class="cookies-notification__desc content-style content-style--small">
        <?php echo wp_kses_post( $cookies_notification ); ?>
      </div>
      <a href="#" class="btn btn--size-small cookies-notification__btn js-cookies-notification-btn">
        <?php esc_html_e( 'I agree', 'wpbit4bytes' ); ?>
      </a>
    </div>
  </div>
  <?php
}
