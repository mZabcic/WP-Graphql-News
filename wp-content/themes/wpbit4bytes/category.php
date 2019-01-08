<?php
/**
 * Display regular index/home page
 *
 * @package Wpbit4bytes
 */

get_header();
?>
<div class="article-category">
<div class="article-category__container">
    <div class="article-category__content-wrap">
        
        <div class="article-category__content">
        <div class="article-category__heading">
            <h1 class="article-category__title"><?php single_cat_title(); ?></h1>
            <p class="article-category__desc"><?php echo category_description(); ?></p>
        </div>
        <div class="article-category__grid">
        <?php if (function_exists('z_taxonomy_image')){ ?>
            <div class="article-category__image">
                <?php z_taxonomy_image(NULL, 'listing-grid'); ?>
                
            </div>
        <?php } ?>
            <?php
            if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/listing/articles/grid' );
            }

            the_posts_pagination();

            } else {

            get_template_part( 'template-parts/listing/articles/empty' );

            };
            ?>
        </div>
        </div>
        <div class="article-category__sidebar">
            <?php  
              get_template_part( 'template-parts/sections/latest-news' );  
            ?>
        </div>
    </div>
</div>
</div>

<?php
get_footer();
