<?php
/**
 * Display regular index/home page
 *
 * @package Wpbit4bytes
 */
$query = new WP_Query( $section_args );
$category = get_category_by_slug( $section_args["category_name"] );

?>
<div class="article-category">
<div class="article-category__container article-category__container--no-border">
    <div class="article-category__content-wrap">
        
        <div class="article-category__content">
        <div class="article-category__heading">
            <h1 class="article-category__title"><a href="/kategorija/<?php echo $category->slug; ?>" ><?php echo $category->name; ?> </a></h1>
        </div>
        <div class="article-category__grid">
            <?php
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                get_template_part( 'template-parts/listing/articles/grid' );
            }

            the_posts_pagination();

            } else {

            get_template_part( 'template-parts/listing/articles/empty' );

            };
            ?>
        </div>
        </div>
        
    </div>
</div>
</div>
