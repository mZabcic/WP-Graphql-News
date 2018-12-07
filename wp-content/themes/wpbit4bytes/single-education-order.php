<?php
/**
 * Single page for Posts
 *
 * @package Wpbit4bytes
 */
acf_form_head(); 
get_header();
?>
<div class="article-category">
<div class="article-category__container">
    <div class="article-category__content-wrap">
        
        <div class="article-category__content">
        <div class="article-category__heading">
            <h1 class="article-category__title">Prijavite se<br><?php the_title(); ?></h1>
            <p class="article-category__desc">
            Sva polja označena znakom (*) moraju biti ispunjena kako bi prijavnica bila ispravna. Prijava je obvezujuća, otkazivanje prijave javiti telefonski ili e-mailom na info@temporis.hr najkasnije dva dana prije edukacije.
            </p>
        </div>
        <?php //the_content(); ?>
   
            <?php
            if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                //get_template_part( 'page-templates/page','education' );
                the_content();
                advanced_form( 'form_5bea02b3dde3d');
               the_field('ime'); 
				
			acf_form();
 
            }

            the_posts_pagination();

            } else {

            get_template_part( 'template-parts/listing/articles/empty' );

            };
            ?>
        </div>
        <div class="article-category__sidebar">
            <?php  
                get_sidebar('page');

                echo do_shortcode('[catlist taxonomy="profilerole" post_type="profile" numberposts="2" ]');
                //https://github.com/picandocodigo/List-Category-Posts/wiki/More-parameters-you-can-use
                echo do_shortcode('[catlist catlink="yes" posts_morelink="Read more about this post" template="list" thumbnail="yes" excerpt="full" thumbnail_size="listing" numberposts="2" ]');
            
            ?>
        </div>
    </div>
</div>
</div>

<?php
get_footer();
