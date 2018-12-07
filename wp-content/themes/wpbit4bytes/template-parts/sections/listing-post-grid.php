<?php
/**
 * Single Page
 *
 * @package Wpbit4bytes\Template_Parts\Single
 */

$class_list = '';
$class_section ='';
$template='';
$template_name='Default List';
$title = 'Archive List: '.$template;
$subtitle='';
if (isset($section_args['class-list'])){
    $class_list=$section_args['class-list'];
  }
if (isset($section_args['featured'])){
  $class_section .='section--feature';
}
if (isset($section_args['template'])){
  $template =$section_args['template'];
}
if (isset($section_args['section-title'])){
  $title =$section_args['section-title'];
}
if (isset($section_args['section-subtitle'])){
  $subtitle =$section_args['section-subtitle'];
}
if (isset($section_args['section-carousel'])){
  if($section_args['section-carousel']){
    $class_list .= ' is-carousel-'.$section_args['section-carousel'];
  }
}

?>

<section class="section <?php echo $class_section; ?>" id="post-<?php echo esc_attr( $post->ID ); ?>">
  <div class="section__container">
    <header class="section__header section--text-left">
      <h1 class="section__header-title">
           <?php echo __($title ,B4B_THEME_NAME);?>
      </h1>
      <p class="section__header-subtitle section--text-left">
           <?php echo __($subtitle,B4B_THEME_NAME);?>
       </p>

     
    </header>

<?php
echo '<div class="listing-post-grid listing-post-grid--no '.$class_list.'" >';

$the_query = new WP_Query( $section_args ); 
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post(); 
  get_template_part( 'template-parts/listing/post/grid'  );
endwhile;
endif;
wp_reset_postdata();



echo '</div>';
if (isset($section_args['section-carousel'])){
  if($section_args['section-carousel']!='default'){
        get_template_part( 'template-parts/parts/slick-custom-buttons'  );  
      
    
  }
}

?>

 </div>



  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>


