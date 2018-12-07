<?php
/**
 * Display regular search page with
 * title and regular listing sorted by date
 *
 * @package Wpbit4bytes
 */

get_header();

global $wp_query;
$results_count =  $wp_query->found_posts.esc_html__(' results found.', 'wpbit4bytes' );

?>
<div class="search__container">
  <div class="search__form-wrap">
    <form role="search" method="get" class="search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
      <div class="search__search-form-field">
        <span class="search__search-form-search-for"><?php echo esc_html__( 'Tražili ste:', 'wpbit4bytes' ) ?></span>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search__search-form-search-input js-search-form-input input" placeholder="<?php esc_html_e( 'Upišite pojam za pretraživanje!', 'wpbit4bytes' ); ?>" />
        <i class="b4bicon b4bicon-zoom"></i>
      </div>
      <input type="hidden" name="post_type" value="any" />
      <p class="search__results-count">
        <?php echo $results_count; ?>
      </p>
    </form>
    
  </div>

<?php
if ( have_posts() ) { ?>

  <!-- Page Title -->
  <header class="search__header">
    <h1 class="search__header-title">
      <?php
      // translators: 1: Search Query.
      printf( esc_html__( 'Search Results for: %s', 'wpbit4bytes' ), '<span>' . get_search_query() . '</span>' );
      ?>
    </h1>
  </header>
<?php } ?>

<!-- Listing Section -->

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/listing/search/grid' );
  };

  the_posts_pagination(
    array(
        'screen_reader_text' => ' ',
    )
  );
  
} else {
  get_template_part( 'template-parts/listing/search/empty' );

};
?>
<div class="search__load-more">
    <a href="#" class="btn ">Load More</a>
</div>

<div id="response-to-this">
'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
</div>

<div data-action="searchloadmore" data-query="{paged: 1}" 

     data-current-page="<?php echo get_query_var( 'paged' ) ? get_query_var('paged') : 1?>" 
     data-max-page="<?php  echo $wp_query->max_num_pages ?>"
     data-query="<?php json_encode( $wp_query->query_vars )?>"
     data-responseto="#response-to-this" class="btn btn--color-load-more button button-loadmore style2 js-bt-loading js-bt-loadmore">
      <span class="txt-default">Load More</span>
      <span class="txt-loading">Loading...</span>
      <div class="bt-load"></div>
      <div class="bt-load"></div>
      <div class="bt-load"></div>
      <div class="bt-load"></div>
      <div class="bt-load"></div>
</div>
</div>
<?php
get_footer();
