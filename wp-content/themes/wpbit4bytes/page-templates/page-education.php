<div class="section-education">
    <h2 class="section-education__title">Vrijeme održavanja</h2>
    <div class="section-education__content">
        <ul class="section-education__content-list">
            <li>
                <?php the_field( 'start_date' ); ?>
            </li>
            <li>
                <?php the_field( 'registracija_polaznika' ); ?>
            </li>
            <li>
                <?php the_field( 'trajanje' ); ?>
            </li>
        </ul>
    </div>

    <h2 class="section-education__title">Mjesto održavanja</h2>
    <div class="section-education__content">
        <ul class="section-education__content-list">
            <li>
                <?php the_field( 'mjesto' ); ?>
            </li>
            <?php if( get_field('hotel') ): ?>
            <li>
                <?php the_field( 'hotel' ); ?>
            </li>
            <?php endif; ?>
        </ul>
    </div>

    <h2 class="section-education__title">PDF dokumenti</h2>
    <div class="section-education__content"> 
        <?php 
         
          // check if the repeater field has rows of data
        if( have_rows('pridruzene_datoteke') ):
            // loop through the rows of data
            while ( have_rows('pridruzene_datoteke') ) : the_row();
                $file = get_sub_field('datoteka_pridruzena');
                $caption = $file['description'];
                $icon =  $file['sizes']['thumbnail'];
                $title = $file['title'];
                $caption = $file['caption'];
        ?>

            <a href="<?php echo $file['url']; ?>">
               <span><?php echo $title; ?></span>
               <?php echo $file['filename']; ?>
            </a>
        <?php  endwhile; ?>
          <?php  endif; ?>
    </div>

    <h2 class="section-education__title">Naknada i nastavni materijal</h2>
    <div class="section-education__content">
    <?php the_field( 'naknada' ); ?>
    </div>

    <h2 class="section-education__title">Predavači</h2>
    <div class="section-education__content">
        <?php $predavaci = get_field( 'predavaci' ); ?>
        <?php if ( $predavaci ): ?>
            <?php foreach ( $predavaci as $post ):  ?>
                <?php setup_postdata ($post); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>


    <h2 class="section-education__title">Bodovi</h2>
    <div class="section-education__content">
    <?php the_field( 'broj_bodova' ); ?>
    </div>


    <h2 class="section-education__title">Detaljnije o edukaciji</h2>
    <div class="section-education__content">
        <div class="accordion">
            <div class="accordion__container">
            <?php 
                
                // check if the repeater field has rows of data
            if( have_rows('detalji_edukacije') ):
                // loop through the rows of data
                while ( have_rows('detalji_edukacije') ) : the_row();
                    $naslov = get_sub_field('detalj_naslov');
                    $opis   = get_sub_field('detalj_opis');
            ?>
 <div class="accordion__item is-active1" data-accordion="" data-skrollex="" data-sk-group="">
        <div class="accordion__header">
            <a aria-expanded="true" aria-controls="collapsible-2" class="accordion__toggle" href="#collapsible-2">
                <span class="accordion__toggle-title"><?php echo $naslov?></span>
                <div class="accordion__toggle-icon ">
                    <div class="accordion__circle-plus is-opened1 is-closed">
                        <div class="accordion__circle">
                            <div class="accordion__circle-horizontal"></div>
                            <div class="accordion__circle-vertical"></div>
                        </div>
                    </div>
                </div>           
            </a>
        </div>
        <div id="collapsible-2" aria-hidden="false" class="accordion__content">
            <p>
                <?php echo $opis?>
            </p>
        </div>
    </div>
                
            <?php  endwhile; ?>
                <?php  endif; ?>
            </div>
        </div>
    </div>


    <h2 class="section-education__title">Tko sudjeluje</h2>
    <div class="section-education__content">
       <?php the_field( 'tko_sudjeluje' ); ?>
    </div>


    <h2 class="section-education__title">Prijaviti se možete</h2>
    <div class="section-education__content">
         <ul class="section-education__content-list">
            <li>
                <a href="#">Putem online prijavnice</a>
            </li>
            <li>
                na način da ispunjenu pdf. prijavnicu pošaljete e-mailom na adresu info@temporis.hr ili faxom na broj: 01/6431 870.
            </li>
        </ul>
    </div>

    <?php $unos_slike = get_field( 'unos_slike' ); ?>
<?php if ( $unos_slike ): ?>
	<?php foreach ( $unos_slike as $post ):  ?>
		<?php setup_postdata ($post); ?>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

    <div class="section-education__sign">
        <a href="narudzba" class="btn">Prijavi se</a>
    </div>

<?php 

   advanced_form( 'form_5bea02b3dde3d');
 
?>


</div>