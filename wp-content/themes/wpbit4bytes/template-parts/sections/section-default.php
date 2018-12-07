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
if (isset($section_args['class-content-part'])){
    $class_list=$section_args['class-content-part'];
  }
if (isset($section_args['class-section'])){
  $class_section=$section_args['class-section'];
}
if (isset($section_args['featured'])){
  $class_section .='section--feature';
}
if (isset($section_args['template-part'])){
  $template =$section_args['template-part'];
}
if (isset($section_args['title'])){
  $title =$section_args['title'];
}
if (isset($section_args['subtitle'])){
  $subtitle =$section_args['subtitle'];
}
if (isset($section_args['carousel'])){
  if($section_args['carousel']){
    $class_list .= ' is-carousel-'.$section_args['carousel'].' ';
  }
}
if (isset($section_args['content-indented'])){
  if($section_args['content-indented']){
    $class_section .= ' section--content-indented ';
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
echo '<div class="section__content '.$class_list.' ">';
if(isset($section_args['query'])){
    $the_query = new WP_Query( section_args['query'] ); 
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post(); 
        get_template_part( $template  );
        endwhile;
    endif;
    wp_reset_postdata();
}else{
    get_template_part( $template  ); 
}
echo '</div>';

?>

 </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</section>


