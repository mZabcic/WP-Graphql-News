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
<section class="single" id="<?php echo esc_attr( $post->ID ); ?>">
<div class="single__container single__container--spacing">
  <header>
    <h1 class="single__title">
      <?php the_title(); ?>
    </h1>
  </header>
  <div class="single__image" style="background-image: url('<?php echo esc_url( $image['image'] ); ?>');"></div>
  <div class="single__content content-style content-media-style">
    <?php the_content(); ?>
  </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>

</section>



<?php
// Query Arguments
$args = array(
	'post_type' => array('profile'),
	'order' => 'DESC',
    'orderby' => 'title',
    'tax_query' => array(
        array (
            'taxonomy' => 'profilerole',
            'field' => 'slug',
            'terms' => 'main',
        )
    ),
);
?>


<div class="site-members">
    <div class="site-members__container">
        <h2 class="site-members__title"><?php esc_html_e( 'Stručnjaci', 'wpbit4bytes' );?></h2>
        <?php
            // The Query
            $query_profiles = new WP_Query( $args );

            // The Loop
            if ( $query_profiles->have_posts() ) {
                while ( $query_profiles->have_posts() ) {
                    $query_profiles->the_post();
                        // Your custom code
        ?>

        <div class="site-members__content-wrap">
            <div class="site-members__image">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="site-members__content">
                
                <h1 class="site-members__content-title">
                    <?php the_title(); ?>
                </h1>
                <span class="site-members__content-subtitle">
                    <?php the_subtitle(); ?>
                </span>
                <p class="site-members__content-excerpt">
                <?php echo get_the_excerpt(); ?>
                </p>
                <div class="content-style">
                <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php
                }
            } else {
                // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        ?>
    </div>
</div>
