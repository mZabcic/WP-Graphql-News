<?php
 $args = array(
    'orderby' => 'date',
    'posts_per_page' => '3'
);
$query = new WP_Query( $args );
?>

<section class="latest">
<div class="article-category__title">Najnovije vijesti</div>
<?php if( $query->have_posts() ) : 
            while( $query->have_posts() ): $query->the_post(); 
                get_template_part( 'template-parts/single/latest-post' );
            endwhile;
            wp_reset_postdata();
        else :
            echo 'No posts found';
        endif;
?>
</section>