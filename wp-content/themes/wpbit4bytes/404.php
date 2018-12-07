<?php
/**
 * 404 error page
 *
 * @package Wpbit4bytes
 */

get_header();

?>

<div class="page-error">
    <div class="page-error__container">
        <div class="page-error__heading">
            <h1 class="page-error__heading-title"><?php esc_html_e( 'Opa, greška 404', 'wpbit4bytes' );?></h1>
            <p class="page-error__heading-text">
                <?php esc_html_e( 'Duboko se ispričavamo na neugodnosti, možemo Vas
            možda informirati o ', 'wpbit4bytes' );?>
                <a href="#">Kraljevska kobasica?</a>
            </p>
        </div>
        <div class="page-error__content">
            <p class="page-error__search-text">
                <?php esc_html_e( 'Osim toga, možete potražiti što vas zanima preko naše tražilice', 'wpbit4bytes' );?>
            </p>
            <form role="search" method="get" class="search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="header__search-form-input js-search-form-input input" placeholder="<?php esc_html_e( 'Upišite pojam za pretraživanje!', 'wpbit4bytes' ); ?>" />
                <input type="hidden" name="post_type" value="any" />

           
            </form>
        </div>
     
    </div>
</div>


<?php
get_footer();
