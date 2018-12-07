<?php
/**
 * Hero story
 *
 * @package Wpbit4bytes\Template_Parts\Sections\Hero Story
 */


?>

<!-- Single Content Section -->
<section class="section section--feature" id="post-<?php echo esc_attr( $post->ID ); ?>">
  <div class="section__container">
    <header class="section__header section--text-indented">
      <h1 class="section__header-title">
        <?php echo __('Hello Hero Story.',B4B_THEME_NAME);?>
      </h1>
      <p class="section__header-subtitle section--text-left">
      <?php echo __('Communication in SITE happens in channels, organized by project, topic, team, or whatever makes sense for you.',B4B_THEME_NAME);?>
       
       </p>
    </header>
    <div class="section__content-wrap-no">
        <div class="hero-story__list">
            <div class="hero-story__item">
                <div class="hero-story__stat-number">
                    1000
                </div>
                <h3 class="hero-story__stat-title"><?php echo __('Stat text',B4B_THEME_NAME);?></h3>
                <p class="hero-story__stat-text">
                <?php echo __('Communication in SITE happens in channels, organized by project, topic, team, or whatever makes sense for you.',B4B_THEME_NAME);?>
                </p>
                <a href="#" class="hero-story__stat-cta btn">CTA</a> 
            </div>
            <div class="hero-story__item">
                <div class="hero-story__stat-number">
                    1000
                </div>
                <h3 class="hero-story__stat-title"><?php echo __('Stat text',B4B_THEME_NAME);?></h3>
                <p class="hero-story__stat-text">
                  <?php echo __('Communication in SITE happens in channels, organized by project, topic, team, or whatever makes sense for you.',B4B_THEME_NAME);?>
                </p>
                <a href="#" class="hero-story__stat-cta btn">CTA</a> 
            </div>
            <div class="hero-story__item">
                <div class="hero-story__stat-number">
                    1000
                </div>
                <h3 class="hero-story__stat-title"><?php echo __('Stat text',B4B_THEME_NAME);?></h3>
                <p class="hero-story__stat-text">
                <?php echo __('Communication in SITE happens in channels, organized by project, topic, team, or whatever makes sense for you.',B4B_THEME_NAME);?>
                </p>
                <a href="#" class="hero-story__stat-cta btn">CTA</a> 
            </div>
            <div class="hero-story__item">
                <div class="hero-story__stat-number">
                    1000
                </div>
                <h3 class="hero-story__stat-title"><?php echo __('Stat text',B4B_THEME_NAME);?></h3>
                <p class="hero-story__stat-text">
                <?php echo __('Communication in SITE happens in channels, organized by project, topic, team, or whatever makes sense for you.',B4B_THEME_NAME);?>
                </p>
                <a href="#" class="hero-story__stat-cta btn">CTA</a> 
            </div>
        </div>
        </div>
   </div>
</section>
